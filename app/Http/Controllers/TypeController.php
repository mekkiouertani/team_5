<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $formData = $request->validated();
        $type = Type::create($formData);
        return to_route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(type $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetypeRequest $request, type $type)
    {
        $formData = $request->validated();

        $type->fill($formData);
        $type->update();
        return to_route('type.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type $type)
    {
        $type->delete();
        return to_route('type.index')->with('message', "Il Progetto '$type->title' è stato  eliminato");
    }
}
