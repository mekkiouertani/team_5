@extends('layouts.app')


<h1>EDIT</h1>

<div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
    <section id="item_info" class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('item.update', $item->id) }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1">
            @csrf
            @method('PUT')
            {{-- NAME --}}
            <label for="name">name</label>
            <input type="text" name="name" id="name" placeholder="inserisci nome"
                class="form-control text-center  @error('name') is-invalid @enderror"
                value="{{ old('name', $item->name) }}" required max="200">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            {{-- DESCRIPTION --}}
            <label for="description">description</label>
            <input type="text" name="description" id="description" placeholder="description"
                class="form-control text-center  @error('description') is-invalid @enderror"
                value="{{ old('description', $item->description) }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            {{-- CATEGORY --}}
            <label for="category">category</label>
            <input type="text" name="category" id="category" placeholder="category"
                class="form-control text-center  @error('category') is-invalid @enderror"
                value="{{ old('category', $item->category) }}" required maxlength="100">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            {{-- TYPE --}}
            <label for="type">type</label>
            <input type="text" name="type" id="type" placeholder="type"
                class="form-control text-center @error('type') is-invalid @enderror"
                value="{{ old('type', $item->type) }}" required maxlength="100">
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            {{-- WEIGHT --}}
            @error('weight')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="weight">weight</label>
            <input type="text" name="weight" id="weight" placeholder="weight"
                class="form-control text-center @error('weight') is-invalid @enderror"
                value="{{ old('weight', $item->weight) }}" required maxlength="10">
            {{-- COST --}}
            <label for="cost">cost</label>
            <input type="text" name="cost" id="cost" placeholder="cost"
                class="form-control text-center
                @error('cost') is-invalid @enderror"
                value="{{ old('cost', $item->cost) }}" required maxlength="20">
            @error('cost')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            {{-- BUTTON SUBMIT --}}
            <button type="submit" class="btn btn-primary">invia</button>
        </form>
    </section>
</div>
