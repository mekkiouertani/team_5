<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Character;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.characters.create', compact('types'));
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

        $newCharacter = Character::create($formData);
        return to_route('admin.characters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        return view('admin.characters.edit', compact('character', 'types'));
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
