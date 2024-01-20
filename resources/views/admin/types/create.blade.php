@extends('layouts.admin')

<h1>CREATE</h1>

<div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
    <section id="comic_info" class="container">
        <form action="{{ route('admin.types.store') }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1">
            @csrf
            <label for="name">name</label>
            <input type="text" name="name" id="name" placeholder="inserisci nome"
                class="form-control text-center " required maxlength="200">

            <label for="desc">desc</label>
            <input type="text" name="desc" id="desc" placeholder="desc" class="form-control text-center">

            <button type="submit" class="btn btn-primary">invia</button>
        </form>
    </section>
</div>
