@extends('layouts.app')

@section('title', 'Панель управления')

@section('content')

    <div class="row no-margin mb-2 justify-content-between">


        <div class="col-12 d-flex justify-content-between">
            <a href="{{ route('app.home') }}" class="btn btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('app.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

            <a href="{{ route('app.registration') }}" class="btn btn-primary">
                Create new shop
            </a>
            @if($user->isAppAdmin())
                <a href="{{ route('admin.home') }}" class="btn btn-outline-primary">
                    Go to App Control Panel &rarr;
                </a>
            @endif
        </div>
    </div>

    @if($user->managers()->count() > 0)
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title">Your shops</h5>
            <div class="list-group">
                @foreach($user->managers()->get() as $manager)
                <a href="{{ route('shop.home', ['domain' => $manager->shop->domain]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $manager->shop->company_name }}</h5>
                        <small>{{ $manager->is_owner ? 'Owner' : 'Manager' }}</small>
                    </div>
                    <small>http://{{ $manager->shop->domain }}.{{ config('app.domain') }}</small>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if($user->customers()->count() > 0)
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <div class="list-group">
                    @foreach($user->customers()->get() as $customer)
                        <a href="{{ route('shop.home', ['domain' => $customer->shop->domain]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $customer->shop->company_name }}</h5>
                            </div>
                            <small>http://{{ $customer->shop->domain }}.{{ config('app.domain') }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection