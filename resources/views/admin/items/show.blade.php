@extends('layouts.admin')




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
