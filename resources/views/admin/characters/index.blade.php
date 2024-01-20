{{-- @extends('layouts.app') --}}
@extends('layouts.admin')

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

        <div class="" id="style-6">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                        <tr class=" ">
                            <td class="align-middle">
                                {{ $character['name'] }}

                            </td>
                            <td class="align-middle">

                                {{ $character['type_id'] }}

                            </td>

                            <td class="align-middle">

                                <a class="btn btn-success " href="{{ route('admin.characters.show', $character->id) }}">
                                    <i class="fa-solid fa-eye "></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $characters->links('vendor.pagination.bootstrap-5') }}
        </div>


        @include('partials.modal_delete')
        {{-- @include('vendor.pagination.bootstrap-5') --}}
    </section>
@endsection
