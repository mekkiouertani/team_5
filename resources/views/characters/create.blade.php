@extends('layouts.app')

<h1>CREATE</h1>

    <div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
        <section id="comic_info" class="container">
            <form action="{{ route('character.store') }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1">
                @csrf
                <label for="name">name</label>
                <input type="text" name="name" id="name" placeholder="inserisci nome"
                    class="form-control text-center ">

                <label for="description">description</label>
                <input type="text" name="description" id="description" placeholder="description" class="form-control text-center">

                <label for="type_id">type_id</label>
                <input type="text" name="type_id" id="type_id" placeholder="type_id" class="form-control text-center">


                <label for="attack">attack</label>
                <input type="text" name="attack" id="attack" placeholder="attack" class="form-control text-center">

                <label for="defence">defence</label>
                <input type="text" name="defence" id="defence" placeholder="defence" class="form-control text-center">

                <label for="speed">speed</label>
                <input type="text" name="speed" id="speed" placeholder="speed" class="form-control text-center">

                <label for="life">life</label>
                <input type="text" name="life" id="life" placeholder="life" class="form-control text-center">

                <button type="submit" class="btn btn-primary">invia</button>
            </form>
        </section>
    </div>

