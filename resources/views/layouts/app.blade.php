<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('boson-quantised-1.png')}}" >
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
<script src="https://kit.fontawesome.com/0069a1cc90.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">


    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    @yield('custom-css')

{{--    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src example.com;">--}}

</head>
<style>
    body{
        font-family: 'Roboto', sans-serif;
        background-image: url('https://gonitzoggo.com/assets/images/geometry.png');
        box-sizing: border-box;;
    }

</style>
<body>
    <div id="app">
        @include('includes.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('includes.footer')

    <script src="{{ asset('js/mdb.min.js') }} "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @yield('custom-js')
</body>
</html>
