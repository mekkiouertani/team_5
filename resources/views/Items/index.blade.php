@extends('layouts.app')


@section('content')
    <section class="container mt-5">
        <a href="{{ route('item.create') }}" style="margin-bottom: 40px; color:red;">
            create a new item
        </a>
        @foreach ($items as $item)
            <div>
                {{ $item['name'] }}
            </div>
            <a href="{{ route('item.show', $item->id) }}">
                info
            </a>
            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger cancel-button" type="submit">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        @endforeach
        @include('partials.modal_delete')
    </section>
@endsection
