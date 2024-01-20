@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger cancel-button me-4" type="submit">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                        <form action="{{ route('admin.types.edit', $type->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-warning" type="submit">
                                <i class="fa-solid fa-wrench"></i>
                            </button>
                        </form>
                    </div>
                    <button class="btn btn-danger">
                        <a class="text-white text-decoration-none " href="{{ route('admin.types.index') }}">
                            GO BACK
                        </a>
                    </button>
                </div>
                <h2 class="text-white">{{ $type->name }}</h2>
                <p class="text-white">{{ $type->desc }}</p>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
