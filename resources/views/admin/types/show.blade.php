@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
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

                <div class="card mt-3">
                    <div class="d-flex justify-content-between align-items-center p-5">
                        <div class="my-img-cont">
                            <img src={{ asset('storage/' . $type->image) }} class="card-img-top" alt={{ $type->name }}>
                        </div>
                        <h1>{{ $type->name }}</h1>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $type->desc }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
