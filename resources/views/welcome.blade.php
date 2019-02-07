@extends('layouts.app')

@section('jumbotron')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1>Elpis</h1>
        <p class="lead">A clean and functional social media experience.</p>
        <hr class="my-2">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
            <a class="btn btn-success btn-lg" href="/login" role="button">Login</a>
        </p>
    </div>
</div>
    
@endsection