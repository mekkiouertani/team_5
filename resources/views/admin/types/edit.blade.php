@extends('layouts.admin')

<h1>EDIT</h1>

<div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
    <section id="item_info" class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo"
            class="position-absolute">
            <section id="comic_info" class="container">
                <form action="{{ route('admin.types.update', $type->id) }}" method="POST"
                    class="d-flex flex-column flex-grow-1 gap-1">
                    @csrf
                    @method('PUT')
                    {{-- NAME --}}
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" placeholder="inserisci nome"
                        class="form-control text-center " value="{{ old('name', $type->name) }}" required
                        maxlength="200">
                    {{-- DESC --}}
                    <label for="desc">desc</label>
                    <input type="text" name="desc" id="desc" placeholder="desc"
                        class="form-control text-center" value="{{ old('desc', $type->desc) }}">

                    {{-- BUTTON SUBMIT --}}
                    <button type="submit" class="btn btn-primary">invia</button>
                </form>
            </section>
        </div>
    </section>
</div>
