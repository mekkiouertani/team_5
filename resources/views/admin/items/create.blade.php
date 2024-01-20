@extends('layouts.admin')
@section('content')
    >
    <div style="z-index:1000; top: 10vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
        <h1>Create</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <section id="comic_info" class="container">
            <form action="{{ route('admin.items.store') }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1"
                enctype="multipart/form-data">
                @csrf
                <label for="name">name</label>
                <input type="text" name="name" id="name" placeholder="inserisci nome"
                    class="form-control text-center ">

                <label for="description">description</label>
                <input type="text" name="description" id="description" placeholder="description"
                    class="form-control text-center">

                <label for="damage_dice">Damage Dice</label>
                <input type="text" name="damage_dice" id="damage_dice" placeholder="damage_dice"
                    class="form-control text-center">
                <label for="category">category</label>
                <input type="text" name="category" id="category" placeholder="category"
                    class="form-control text-center">
                    <label for="type">type</label>
                    <input type="text" name="type" id="type" placeholder="type"
                        class="form-control text-center">
                <label for="item">item</label>
                <input type="text" name="item" id="item" placeholder="item" class="form-control text-center">
                <label for="weight">weight</label>
                <input type="text" name="weight" id="weight" placeholder="weight" class="form-control text-center">
                <label for="cost">cost</label>
                <input type="text" name="cost" id="cost" placeholder="cost" class="form-control text-center">
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2 border d-flex justify-content-center ">
                    <img id="uploadPreview" width="320" src="https://via.placeholder.com/1000x400" alt="preview">
                </div>
                <button type="submit" class="btn btn-primary">invia</button>
            </form>
        </section>

    </div>
@endsection
