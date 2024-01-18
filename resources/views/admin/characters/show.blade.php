@extends('layouts.app')

@section('content')
    {{-- <h1>show printing data</h1> --}}

    <div class="container mx-auto  ">
        <div class="container-sm h-100   ">
            <div class="row h-100 mx-auto my-auto w-75 justify-content-center text-center ">
                <div class="col-12 p-2 m-3 rounded-3  " style="background-color: #222222 ">
                    <div class="card h-100  "style="background-color: #F7AD19 ">
                        <div class=" card-body text-center text-light ">
                            <div class="p-3 rounded-3 bg-opacity-25   " style="background-color: #222222 ">
                                <h1 class=" card-title text-uppercase fw-bold ">{{ $character['name'] }}</h1>
                            </div>

                            <h4 class="card-text my-4">{{ $character['description'] }}</h4>
                            <div class=" card-subtitle text-start mt-3 mb-3">Type-id: {{ $character['type_id'] }}</div>
                            <div
                                class=" d-flex align-items-center align-content-center  justify-content-evenly  text-center mt-3 mb-5">
                                <div class=" list-group-item  border-end pe-3 ">Defence: {{ $character['defence'] }}
                                </div>
                                <div class=" list-group-item  border-end pe-3">Speed: {{ $character['speed'] }}</div>
                                <div class=" list-group-item  border-end pe-3">LP: {{ $character['life'] }}</div>
                            </div>
                            <div class="row row-cols-3 mt-5 pt-5 align-items-end  ">
                                <form action="{{ route('admin.characters.destroy', $character->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger cancel-button" type="submit">
                                        <i class="fa-solid fa-trash "></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.characters.edit', $character->id) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">
                                        <i class="fa-solid fa-wrench"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.characters.index') }}" style="margin-bottom: 40px; color:red;">
                                    back
                                </a>
                            </div>

                            @if ($character->type_id)
                                <div class="mb-3">
                                    <h4>type</h4>
                                    <a class="badge text-bg-primary"
                                        href="{{ route('admin.types.show', $character->type->id) }}">{{ $character->type->name }}</a>
                                </div>
                            @endif
                            @if ($character->image)
                                <div class="d-flex flex-row w-50 framed">
                                    <img src="{{ asset('storage/' . $character->image) }}" width="100"
                                        alt="{{ $character->name }}"
                                        @error('image') src="https://picsum.photos/200/300" @enderror style="width: 100%">
                                </div>
                            @endif
                            @if ($character->items)
                                <div class="mb-3">
                                    <h4>items</h4>
                                    @foreach ($character->items as $item)
                                        <a class="badge rounded-pill text-bg-success"
                                            href="{{ route('admin.items.show', $item->id) }}">{{ $item->name }}</a>
                                    @endforeach

                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    {{-- <div>{{ $character['name'] }}</div> --}}
    {{-- <div>{{ $character['description'] }}</div> --}}
    {{-- <div>{{ $character['type_id'] }}</div> --}}
    {{-- <div>{{ $character['defence'] }}</div>
    <div>{{ $character['speed'] }}</div>
    <div>{{ $character['life'] }}</div> --}}

    {{-- <form action="{{ route('character.destroy', $character->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger cancel-button" type="submit">
            <i class="fa-solid fa-trash "></i>
        </button>
    </form> --}}

    {{-- <form action="{{ route('character.edit', $character->id) }}" method="GET">
        @csrf
        <button class="btn btn-warning" type="submit">
            <i class="fa-solid fa-wrench"></i>
        </button>
    </form> --}}

    {{-- <a href="{{ route('character.index') }}" style="margin-bottom: 40px; color:red;">
        back
    </a> --}}
    @include('partials.modal_delete')
@endsection
