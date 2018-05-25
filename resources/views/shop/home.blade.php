@extends('layouts.shop')

@section('title', 'Welcome!')

@section('content')


<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <h1 class="display-4">Welcome to {{ shop()->company_name }}</h1>
        <p class="lead">The shop content goes here.</p>
        <hr class="my-4">
        <p>This is a demo project built on Laravel Framework.</p>
        <a class="btn btn-primary btn-lg" target="_blank" href="https://maxkostinevich.com/blog/multi-domain-laravel">Learn more</a>
    </div>
</div>
@endsection