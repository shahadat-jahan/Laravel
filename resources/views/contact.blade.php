@extends('layouts.master')
@section('content')
    <div class="container-fluid content text-center">
        <h1>Contact Us</h1>
        <div class="container px-5">
            <form method="POST" action="">
                <textarea class="from-control" name="message" rows="10" cols="60" placeholder="Write your message..."></textarea>
                <br/>
                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        </div>
    </div>
@endsection
