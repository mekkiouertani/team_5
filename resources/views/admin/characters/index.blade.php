@extends('layouts.app')

@php
    // to use later for sidebar
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
    <section class="container mt-5 p-3 text-light overflow-y-auto " style="background-color: #222222">
        <div class="d-flex justify-content-between align-items-center mypd ">
            <div>
                <h4><i class="fa-solid fa-users"></i> Personaggi</h4>
            </div>
            <div>
                <a href="{{ route('admin.characters.create') }}" class="btn btn-success ">New character +</a>
            </div>

        </div>


        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($characters as $character)
                    <tr class=" bg-danger ">
                        <td class="align-middle">
                            {{ $character['name'] }}

                        </td>
                        <td>
                            <div style="max-height=80%;">
                                <img class="h-100" src="https://picsum.photos/50/50" alt="{{ $character['name'] }}">
                            </div>
                        </td>
                        <td class="align-middle">

                            {{ $character['type_id'] }}

                        </td>

                        <td class="align-middle">

                            <a href="{{ route('admin.characters.show', $character->id) }}">show</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('partials.modal_delete')
    </section>
@endsection
