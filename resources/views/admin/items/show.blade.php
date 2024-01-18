@extends('layouts.app')

{{-- @section('content')
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
@endsection --}}


@section('content')
    <section class="container my-3" id="item-item">
        <div class="d-flex justify-content-between align-items-center">
            <h1>{{ $item->name }}</h1>

            <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-success px-3">Edit</a>
        </div>

        <div>
            <h3 class="text-light">{{ $item->weight }}</h3>
            <h3 class="text-light">{{ $item->cost }}</h3>
            <p>{!! $item->description !!}</p>

            <img class="text-light" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
            {{-- @if (count($item->tags) > 0)
                <div class="mb-3">
                    <h4>Tags</h4>
                    @foreach ($item->tags as $tag)
                        <a class="badge rounded-pill text-bg-success"
                            href="{{ route('admin.tags.show', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach

                </div>
            @endif --}}
        </div>
        @forelse ($item->characters as $character)
            <tr>
                <th class="list-group-item">
                    <a href="{{ route('admin.characters.show', $character->id) }}"
                        class="link-underline link-underline-opacity-0">
                        {{ $character->title }}</a>
                </th>
                <td>
                    {{ $character->description }}
                </td>

            </tr>
        @empty
            <tr>
                <th>
                    non ci sono progetti della tipologia {{ $item->name }}
                </th>
            </tr>
        @endforelse
    </section>
@endsection
