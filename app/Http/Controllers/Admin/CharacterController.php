<?php

namespace App\Http\Controllers\Admin;

use App\Models\Character;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();
        $items = Item::all();
        return view('admin.characters.index', compact('characters', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();

        return view('admin.characters.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $formData = $request->validated();

        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }

        $character = Character::create($formData);
        if ($request->has('items')) {
            $character->items()->attach($request->items);
        }
        return to_route('admin.characters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $items = Item::all();
        return view('admin.characters.show', compact('character', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $items = Item::all();
        return view('admin.characters.edit', compact('character', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $formData = $request->validated();

        if ($request->hasFile('image')) {
            if ($character->image) {
                Storage::delete($character->image);
            }
            $imagePath = Storage::put('images', $request->image);
            $formData['image'] = $imagePath;
        }

        $character->update($formData);
        if ($request->has('items')) {
            $character->items()->sync($request->items);
        } else {
            $character->items()->detach();
        }
        return to_route('admin.characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if ($character->image) {
            Storage::delete($character->image);
        }
        $character->delete();

        return to_route('admin.characters.index')->with('message', "il fumetto $character->title è stato eliminato");
    }
}
