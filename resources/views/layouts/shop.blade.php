<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fontawesome -->
    <script defer src="//use.fontawesome.com/releases/v5.0.9/js/all.js"></script>


    <link rel="stylesheet" href="{{ mix('shop/css/app.css') }}">

    <title>@yield('title', 'Demo') - {{ config('app.name') }}</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="{{ domain_route('shop.home') }}">{{ shop()->company_name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ domain_route('shop.home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li><a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a></li>
                @guest
                    <li><a class="nav-link" href="{{ domain_route('shop.login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ domain_route('shop.registration') }}">Registration</a></li>
                @else
                    <li class="nav-item dropdown dropdown-image">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $user->name() }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if($user->isShopManager())
                                <a class="dropdown-item" href="{{ domain_route('shop.admin.home') }}">Shop Dashboard</a>
                            @else
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">My Orders</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ domain_route('shop.home') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ domain_route('shop.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>


    @yield('content')




</div>

<script src="{{ mix('shop/js/app.js') }}"></script>

</body>
</html>