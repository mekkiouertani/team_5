@extends('layouts.app')

<h1>EDIT</h1>

<div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
    <section id="item_info" class="container">
        <form action="{{ route('item.update', $item->id) }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1">
            @csrf
            @method('PUT')
            <label for="name">name</label>
            <input type="text" name="name" id="name" placeholder="inserisci nome"
                class="form-control text-center " value="{{ old('name', $item->name) }}">

            <label for="description">description</label>
            <input type="text" name="description" id="description" placeholder="description"
                class="form-control text-center" value="{{ old('description', $item->description) }}">

            <label for="slug">slug</label>
            <input type="text" name="slug" id="slug" placeholder="slug" class="form-control text-center"
                value="{{ old('slug', $item->slug) }}">


            <label for="category">category</label>
            <input type="text" name="category" id="category" placeholder="category" class="form-control text-center"
                value="{{ old('category', $item->category) }}">

            <label for="type">type</label>
            <input type="text" name="type" id="type" placeholder="type" class="form-control text-center"
                value="{{ old('type', $item->type) }}">

            <label for="weight">weight</label>
            <input type="text" name="weight" id="weight" placeholder="weight" class="form-control text-center"
                value="{{ old('weight', $item->weight) }}">


            <label for="cost">cost</label>
            <input type="text" name="cost" id="cost" placeholder="cost" class="form-control text-center"
                value="{{ old('cost', $item->cost) }}">

            <button type="submit" class="btn btn-primary">invia</button>
        </form>
    </section>
</div>
