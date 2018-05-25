@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Authentication</h4>
            <form method="post" action="{{ route('app.login.post') }}">
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
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"  type="email" class="form-control" name="email" placeholder="john.doe@example.com" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password
                    </label>
                    <input id="password" name="password" type="password" class="form-control" name="password" placeholder="password" required>
                    <div class="text-right">
                        <a href="#" class="small">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_remember" value="1"> Remember me
                    </label>
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <div class="text-center mt-3 small">
                    Do not have an account? <a href="{{ route('app.registration') }}">Create a new one</a>
                </div>
            </form>
        </div>
    </div>

@endsection