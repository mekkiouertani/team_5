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
    <div class="btn btn-danger" type="submit">
        <i class="fa-solid fa-trash"></i>
    </div>
</form>
@endsection
