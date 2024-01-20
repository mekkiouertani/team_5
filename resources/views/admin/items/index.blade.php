@extends('layouts.admin')



@section('content')
    <section class="container">
        <h1>item List</h1>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.items.create') }}">Crea nuovo item</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success mb-3 mt-3">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="scrollit">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Type</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Show</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                <a class=" text-decoration-none text-dark"
                                    href="{{ route('admin.items.show', $item->slug) }}"
                                    title="View item">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a class=" text-decoration-none text-dark"
                                    href="{{ route('admin.items.show', $item->weight) }}"
                                    title="View item">{{ $item->weight }}</a>
                            </td>
                            <td>
                                <a class=" text-decoration-none text-dark"
                                    href="{{ route('admin.items.show', $item->type) }}"
                                    title="View item">{{ $item->type }}</a>
                            </td>
                            <td>
                                <a class=" text-decoration-none text-dark"
                                    href="{{ route('admin.items.show', $item->cost) }}"
                                    title="View item">{{ $item->cost }}</a>
                            </td>
                            <td>
                                {{ Str::limit($item->description, 100) }}</td>

                            <td>
                                <a class="link-secondary" href="{{ route('admin.items.edit', $item->id) }}"
                                    title="Edit item"><i class="fa-solid fa-pen"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3"
                                        data-item-title="{{ $item->title }}"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>

                            <td>
                            <form action="{{ route('admin.items.show', $item->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="delete-button btn btn-success ms-3"
                                        data-item-title="{{ $item->title }}"><i
                                            class="fa-solid fa-eye"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
    @include('partials.modal_delete')
@endsection
