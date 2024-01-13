@extends('layouts.app')

@section('content')
    <h1>show printing data</h1>



    <div>{{ $character['name'] }}</div>
    <div>{{ $character['description'] }}</div>
    <div>{{ $character['type_id'] }}</div>
    <div>{{ $character['defence'] }}</div>
    <div>{{ $character['speed'] }}</div>
    <div>{{ $character['life'] }}</div>

    <form action="{{ route('character.destroy', $character->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger cancel-button" type="submit">
            <i class="fa-solid fa-trash "></i>
        </button>
    </form>

    <form action="{{ route('character.edit', $character->id) }}" method="GET">
        @csrf
        <button class="btn btn-warning" type="submit">
            <i class="fa-solid fa-wrench"></i>
        </button>
    </form>

    <a href="{{ route('character.index') }}" style="margin-bottom: 40px; color:red;">
        back
    </a>
    @include('partials.modal_delete')
@endsection
