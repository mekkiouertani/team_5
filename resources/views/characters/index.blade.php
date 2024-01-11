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
    @foreach ($characters as $character)
        <div>
            {{ $character['name'] }}
        </div>
        <a href="{{ route('character.show', $character->id) }}">
            info
        </a>
    @endforeach
@endsection
