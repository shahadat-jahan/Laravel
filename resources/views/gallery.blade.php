@extends('layouts.master')
@section('content')
    <div class="container-fluid content text-center">
        <h1>Gallery</h1>
        <div class="container">
            <form class="d-flex col-6 offset-3" action="{{ route('image') }}" method="post">
                @csrf
                <input class="form-control" type="file" name="image">
                <button class="btn btn-success" type="submit" name="submit">Upload</button>
            </form>
            <a href="{{ asset('public/images/img_5terre.jpg') }}" data-lightbox="photos">
            <img id="myModal" class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_5terre.jpg') }}" alt="Cinque Terre"
                width="300" height="200">
            </a>

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_forest.jpg') }}" alt="Forest"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_lights.jpg') }}"
                alt="Northern Lights" width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_mountains.jpg') }}" alt="Mountains"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_trulli.jpg') }}" alt="Truli"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_chania.jpg') }}" alt="Chania"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_paris.jpg') }}" alt="Paris"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="{{ asset('public/images/img_girl.jpg') }}" alt="Girl"
                width="300" height="200">
        </div>
    </div>
@endsection
