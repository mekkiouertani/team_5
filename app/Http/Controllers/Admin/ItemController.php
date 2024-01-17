<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        // $formData = $request->validated();
        // $slug = Str::slug($formData['name'], '-');
        // $formData['slug'] = $slug;
        // $item = Item::create($formData);

        // return redirect()->route('admin.items.show', $item->id);

        $formData = $request->validated();

        $slug = Item::getSlug($formData['name']);
        $formData['slug'] = $slug;

        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }

        $newItem = Item::create($formData);
        return to_route('admin.items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // $formData = $request->validated();

        // $item->fill($formData);
        // $item->update();
        // return to_route('admin.items.show', $item->id);

        $formData = $request->validated();

        if ($item->name !== $formData['name']) {
            $slug = Item::getSlug($formData['name']);
            $formData['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }
            $imagePath = Storage::put('images', $request->image);
            $formData['image'] = $imagePath;
        }

        $item->update($formData);
        return to_route('admin.items.show', $item->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::delete($item->image);
        }

        $item->delete();
        return to_route('admin.items.index')->with('message', "il fumetto $item->title è stato eliminato");
    }
}
