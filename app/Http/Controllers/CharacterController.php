<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $formData = $request->validated();
        $newCharacter = Character::create($formData);
        return to_route('character.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $formData = $request->validated();

        $character->fill($formData);
        $character->update();
        return to_route('character.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return to_route('character.index')->with('message', "il fumetto $character->title è stato eliminato");
    }
}
