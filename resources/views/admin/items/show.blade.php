@extends('layouts.app')

@section('content')
    <h1>show printing data</h1>



    <div>{{ $item['name'] }}</div>
    <div>{{ $item['description'] }}</div>
    <div>{{ $item['type_id'] }}</div>
    <div>{{ $item['defence'] }}</div>
    <div>{{ $item['speed'] }}</div>
    <div>{{ $item['life'] }}</div>

    @if ($item->image)
        <div class="d-flex flex-row w-50 framed">
            <img src="{{ asset('storage/' . $item->image) }}" width="100" alt="{{ $item->name }}"
                @error('image') src="https://picsum.photos/200/300" @enderror style="width: 100%">
        </div>
    @endif

    <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger cancel-button" type="submit">
            <i class="fa-solid fa-trash "></i>
        </button>
    </form>

    <form action="{{ route('admin.items.edit', $item->id) }}" method="GET">
        @csrf
        <button class="btn btn-warning" type="submit">
            <i class="fa-solid fa-wrench"></i>
        </button>
    </form>

    <a href="{{ route('admin.items.index') }}" style="margin-bottom: 40px; color:red;">
        back
    </a>
    @include('partials.modal_delete')
@endsection
