@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    @auth
    <div class="form-group no-margin mb-2 text-left">
        <a href="{{ route('app.home') }}" class="btn btn-outline-primary">
            &laquo; Cancel
        </a>
    </div>
    @endauth

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Registration</h4>
            <form method="post" action="{{ route('app.registration.post') }}">
                {{ csrf_field() }}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="company_name">Shop Name</label>
                    <input id="company_name" name="company_name" value="{{ old('company_name') }}" type="text" class="form-control" placeholder='Acme Inc.' required autofocus>
                </div>
                <div class="form-group">
                    <label for="company_domain">Shop Domain</label>
                    <div class="input-group">
                        <input id="company_domain" name="company_domain" value="{{ old('company_domain') }}" type="text" class="form-control" placeholder="acme" aria-label="Comapny domain" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">.{{ config('app.domain') }}</span>
                        </div>
                    </div>
                </div>

                @guest
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input id="first_name" name="first_name" value="{{ old('first_name') }}" type="text" class="form-control" placeholder="John">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" value="{{ old('last_name') }}" type="text" class="form-control" placeholder="Doe">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="john.doe@example.com" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password
                        </label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirm Password
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                @endguest

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        Create new shop
                    </button>
                </div>
                <div class="text-center mt-3 small">
                    Already have an account? <a href="{{ route('app.login') }}">Login here</a>
                </div>
            </form>
        </div>
    </div>

@endsection