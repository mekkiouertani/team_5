@extends('layouts.admin')

@section('content')
    <div style="z-index: 1000; top: 10vh; left: 50%; transform: translate(-50%, 0);" id="jumbo" class="position-absolute">
        <section id="comic_info" class="container mb-5">
            <h1>CREATE</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.characters.store') }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1"
                enctype="multipart/form-data">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="inserisci nome"
                    class="form-control text-center ">

                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="description"
                    class="form-control text-center">

                <label for="attack">Attack</label>
                <input type="text" name="attack" id="attack" placeholder="attack" class="form-control text-center">

                <label for="defence">Defence</label>
                <input type="text" name="defence" id="defence" placeholder="defence" class="form-control text-center">

                <label for="speed">Speed</label>
                <input type="text" name="speed" id="speed" placeholder="speed" class="form-control text-center">

                <label for="life">Life</label>
                <input type="text" name="life" id="life" placeholder="life" class="form-control text-center">
                {{-- CHECKBOX --}}
                <div class="mb-3">
                    <div class="form-group mt-5">
                        <h5>Select Items:</h5>
                        <div class="row mt-3">
                            @foreach ($items as $item)
                                <div class="col-3"> <!-- Colonna per ogni checkbox -->
                                    <div class="form-check @error('items') is-invalid @enderror">
                                        <input type="checkbox" class="form-check-input" name="items[]"
                                            value="{{ $item->id }}"
                                            {{ in_array($item->id, old('items', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold ">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('technologies')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{--  --}}
                <div class="mb-3">
                    <label for="type_id">Select a Type</label>
                    <select type="text" class="form-control @error('type_id') is-invalid @enderror" name="type_id"
                        id="type_id">
                        <option value="" selected>Select a Type</option>
                        @foreach ($types as $type)
                            {{-- metto la selezione della cat. se preso --}}
                            <option value="{{ $type->id }}">
                                {{-- {{ old('type_id') == $character->type_id ? 'selected' : '' }} --}}
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Insert an Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    </select>
                    @error('item_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2  d-flex justify-content-center ">
                    <img id="uploadPreview" width="320" src="https://via.placeholder.com/1000x400" alt="preview">
                </div>
                <button type="submit" class="btn btn-primary">invia</button>
            </form>
        </section>
    </div>
@endsection
