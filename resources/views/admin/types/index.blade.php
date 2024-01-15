@extends('layouts.app')
@section('content')
    <section class="container mt-5">
        <a href="{{ route('admin.types.create') }}" style="margin-bottom: 40px; color:red;">
            New type
        </a>
        @foreach ($types as $type)
            <div>
                {{ $type['name'] }}
            </div>
            <a href="{{ route('admin.types.show', $type->id) }}">
                info
            </a>
            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
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
