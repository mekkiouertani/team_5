@extends('layouts.admin')
@section('content')
    <h1>EDIT</h1>

    <div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
        <section id="comic_info" class="container">
            <form action="{{ route('admin.characters.update', $character->id) }}" method="POST"
                class="d-flex flex-column flex-grow-1 gap-1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div>

                    <label for="name">name</label>
                    <input type="text" name="name" id="name" placeholder="inserisci nome"
                        class="form-control text-center " value="{{ old('name', $character->name) }}">
                    <label for="description">description</label>
                    <input type="text" name="description" id="description" placeholder="description"
                        class="form-control text-center" value="{{ old('description', $character->description) }}">
                    <label for="type_id">type_id</label>
                    <input type="text" name="type_id" id="type_id" placeholder="type_id"
                        class="form-control text-center" value="{{ old('type_id', $character->type_id) }}">
                    <label for="attack">attack</label>
                    <input type="text" name="attack" id="attack" placeholder="attack"
                        class="form-control text-center" value="{{ old('attack', $character->attack) }}">
                    <label for="defence">defence</label>
                    <input type="text" name="defence" id="defence" placeholder="defence"
                        class="form-control text-center" value="{{ old('defence', $character->defence) }}">
                    <label for="speed">speed</label>
                    <input type="text" name="speed" id="speed" placeholder="speed" class="form-control text-center"
                        value="{{ old('speed', $character->speed) }}">
                    <label for="life">life</label>
                    <input type="text" name="life" id="life" placeholder="life" class="form-control text-center"
                        value="{{ old('life', $character->life) }}">
                    <div class="mb-3">
                        <label for="type_id">Select type</label>
                        <select class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                            <option value="">Select a type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('type_id', $character->type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 overflow-y-scroll " style="height: 100px; ">
                        <div class="form-group">
                            <h6>Select items</h6>
                            @foreach ($items as $item)
                                <div class="form-check @error('items') is-invalid @enderror">
                                    @if ($errors->any())
                                        <input type="checkbox" class="form-check-input" name="items[]"
                                            value="{{ $item->id }}"
                                            {{ in_array($item->id, old('items', $character->items)) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" class="form-check-input" name="items[]"
                                            value="{{ $item->id }}"
                                            {{ $character->items->contains($item->id) ? 'checked' : '' }}>
                                    @endif
                                    <label class="form-check-label" style="color: white;">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                            @error('items')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 border d-flex justify-content-center ">
                        <img id="uploadPreview" width="320" src="https://via.placeholder.com/1000x400" alt="preview">
                    </div>
                    <button type="submit" class="btn btn-primary">invia</button>
                </div>


            </form>
        </section>
    </div>
@endsection
