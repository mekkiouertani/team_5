@extends('layouts.app')

@section('content')
    <h2>Show Type</h2>



    <div>{{ $type['name'] }}</div>
    <div>{{ $type['description'] }}</div>

    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger cancel-button" type="submit">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>

    <form action="{{ route('admin.types.edit', $type->id) }}" method="GET">
        @csrf
        <button class="btn btn-warning" type="submit">
            <i class="fa-solid fa-wrench"></i>
        </button>
    </form>

    <a href="{{ route('admin.types.index') }}" style="margin-bottom: 40px; color:red;">
        back
    </a>
    @include('partials.modal_delete')
@endsection
