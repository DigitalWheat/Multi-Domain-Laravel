@extends('layouts.shop')

@section('title', 'Registration')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registration</div>

                <div class="card-body">
                    <form method="POST" action="{{ domain_route('shop.registration.post', ['domain' => request('subdomain')]) }}">
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


                        <div class="form-group row mb-0">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-12 text-right text-muted small">
                                Already have an account? <a class="" href="{{ domain_route('shop.login') }}">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection