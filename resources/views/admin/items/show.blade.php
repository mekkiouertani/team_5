@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger cancel-button me-4" type="submit">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                        <form action="{{ route('admin.items.edit', $item->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-warning" type="submit">
                                <i class="fa-solid fa-wrench"></i>
                            </button>
                        </form>
                    </div>
                    <button class="btn btn-danger">
                        <a class="text-white text-decoration-none " href="{{ route('admin.items.index') }}">
                            GO BACK
                        </a>
                    </button>
                </div>
                <div class="mt-2">
                    <h2 class="text-white">{{ $item->name }}</h2>
                    <p class="text-white">CATEGORY: {{ $item->category }}</p>
                    <p class="text-white">WEIGHT: {{ $item->weight }}</p>
                    <p class="text-white">TYPE: {{ $item->type }}</p>
                    <p class="text-white">COST: {{ $item->cost }}</p>
                    <img class="text-light" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                </div>
            </div>
        </div>
        @include('partials.modal_delete')
    </div>
@endsection
