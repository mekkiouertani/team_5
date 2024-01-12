@extends('layouts.app')

@php
    $sidebar = [
        [
            'title' => 'BOARD',
            'subparts' => [
                [
                    'title' => 'dasboard',
                    'image' => '',
                ],
            ],
        ],
        [
            'title' => 'FILE',
            'subparts' => [
                [
                    'title' => 'Personaggi',
                    'image' => '',
                ],
                [
                    'title' => 'Classi',
                    'image' => '',
                ],
                [
                    'title' => 'Oggetti',
                    'image' => '',
                ],
            ],
        ],
    ];
@endphp

@section('content')
    <a href="{{ route('character.create') }}" style="margin-bottom: 40px; color:red;">
        create a new character
    </a>

    @foreach ($characters as $character)
        <div>
            {{ $character['name'] }}
        </div>
        <a href="{{ route('character.show', $character->id) }}">
            info
        </a>
        <form action="{{ route('character.destroy', $character->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    @endforeach
@endsection
