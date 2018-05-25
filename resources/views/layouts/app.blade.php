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


    <link rel="stylesheet" href="{{ mix('app/css/app.css') }}">

    <title>@yield('title', 'Demo') - {{ config('app.name') }}</title>
</head>
<body class="is-no-margin">


<div class="container-fluid pb-5">

    <div class="row justify-content-md-center">
        <div class="card-wrapper col-4 mt-5">
            <div class="brand text-center mb-3">
                <a href="{{ route('app.home') }}" title="{{ config('app.name') }}"><img src="{{ asset('app/img/logo.png') }}"></a>
            </div>
            @yield('content')

            <footer class="footer mt-3">
                <div class="container-fluid">
                    <div class="footer-content text-center small">
                        <span class="text-muted">
                            &copy; {{ date('Y') }} All rights reserved.<br>
                             <a href="{{ config('app.url') }}" title="{{ config('app.name') }}" target="_blank">{{ config('app.name') }}</a> &mdash; Demo Application.<br>
                            Built on top of <a href="https://graindashboard.com" title="Grain Dashboard" target="_blank">Grain Dashboard</a> . Developed by <a href="https://digitalwheat.com" title="DigitalWheat" target="_blank">DigitalWheat</a>.
                        </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>



</div>

<script src="{{ mix('app/js/app.js') }}"></script>

</body>
</html>