@extends('layouts.app')

<h1>CREATE</h1>

    <div style="z-index:1000; top: 20vh; left: 50%; transform: translate(-50%, 0);}" id="jumbo" class="position-absolute">
        <section id="comic_info" class="container">
            <form action="{{ route('item.store') }}" method="POST" class="d-flex flex-column flex-grow-1 gap-1">
                @csrf
                <label for="name">name</label>
                <input type="text" name="name" id="name" placeholder="inserisci nome"
                    class="form-control text-center ">

                <label for="description">description</label>
                <input type="text" name="description" id="description" placeholder="description" class="form-control text-center">

                <label for="slug">slug</label>
                <input type="text" name="slug" id="slug" placeholder="slug" class="form-control text-center">


                <label for="category">category</label>
                <input type="text" name="category" id="category" placeholder="category" class="form-control text-center">

                <label for="type">type</label>
                <input type="text" name="type" id="type" placeholder="type" class="form-control text-center">

                <label for="weight">weight</label>
                <input type="text" name="weight" id="weight" placeholder="weight" class="form-control text-center">


                <label for="cost">cost</label>
                <input type="text" name="cost" id="cost" placeholder="cost" class="form-control text-center">

                <button type="submit" class="btn btn-primary">invia</button>
            </form>
        </section>
    </div>

