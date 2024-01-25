@extends('layouts.admin')
@section('content')
    <section class="container ">
        <div class="pt-5 mb-3 d-flex justify-content-between align-items-center">
            <h1>Types List</h1>
            <a class="btn btn-success" href="{{ route('admin.types.create') }}">Crea nuovo type</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success mb-3 mt-3">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="scrollit" id="style-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="col">{{ $type->id }}</th>
                            <td>
                                <a class=" text-decoration-none " href="{{ route('admin.types.show', $type->id) }}"
                                    title="View type">{{ $type->name }}</a>
                            </td>
                            <td>
                                <a class=" text-decoration-none " href="{{ route('admin.types.show', $type->desc) }}"
                                    title="View type">{{ Str::limit($type->desc, 100, '...') }}</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.types.edit', $type->id) }}"
                                    title="Edit type"><i class="fa-solid fa-pen"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3"
                                        data-item-title="{{ $type->title }}"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.types.show', $type->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="delete-button btn btn-success ms-3"
                                        data-item-title="{{ $type->title }}"><i class="fa-solid fa-eye"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $types->links('vendor.pagination.bootstrap-5') }}
        </div>
        @include('partials.modal_delete')
    </section>
@endsection
