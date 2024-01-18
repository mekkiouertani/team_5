@extends('layouts.app')

@section('content')
    <div style="z-index: 1000; top: 10vh; left: 50%; transform: translate(-50%, 0);" id="jumbo" class="position-absolute">
        <section id="comic_info" class="container">
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
                <label for="name">name</label>
                <input type="text" name="name" id="name" placeholder="inserisci nome"
                    class="form-control text-center ">

                <label for="description">description</label>
                <input type="text" name="description" id="description" placeholder="description"
                    class="form-control text-center">

                <label for="type_id">type_id</label>
                <input type="text" name="type_id" id="type_id" placeholder="type_id" class="form-control text-center">


                <label for="attack">attack</label>
                <input type="text" name="attack" id="attack" placeholder="attack" class="form-control text-center">

                <label for="defence">defence</label>
                <input type="text" name="defence" id="defence" placeholder="defence" class="form-control text-center">

                <label for="speed">speed</label>
                <input type="text" name="speed" id="speed" placeholder="speed" class="form-control text-center">

                <label for="life">life</label>
                <input type="text" name="life" id="life" placeholder="life" class="form-control text-center">

                <!--  -->
                <!-- <div class="mb-3">
                                                <div class="form-group">
                                                    <h6>Seleziona l'item</h6>
                                                    @foreach ($items as $item)
    <div class="form-check @error('items') is_invalid @enderror">
                                                            <input type="checkbox"class="form-check-input" name="items[]" value="{{ $item->id }}">
                                                            {{ in_array($item->id, old('items', [])) ? 'checked' : '' }}
                                                            <label for="items" class="form-check-label">{{ $item->name }}</label>
                                                        </div>
    @endforeach
                                                    @error('items')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                                </div>
                                            </div> -->
                <!--  -->

                <div class="mb-3">
                    <label for="type_id">select a type</label>
                    <select type="text" class="form-control @error('type_id') is-invalid @enderror" name="type_id"
                        id="type_id">

                        <option value="" selected>select a type</option>
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
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3  overflow-y-scroll " style="height: 100px; ">
                    <h5>items</h5>

                    @foreach ($items as $item)
                        <div class="form-check @error('tags') is-invalid @enderror">
                            <input type="checkbox" class="form-check-input" name="items[]" value="{{ $item->id }}"
                                {{ in_array($item->id, old('item', [])) ? 'checked' : '' }}>
                            <label class="form-check-label " style="color: white;">
                                {{ $item->name }}
                            </label>
                        </div>
                    @endforeach

                    </select>
                    @error('item_id')
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
