

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Boson</title>
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

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('trumbowyg/dist/ui/trumbowyg.min.css')}}">

{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
{{--        {{$no_mathjax}}--}}

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    @yield('custom-css')

{{--    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src example.com;">--}}

</head>
<style>
    @font-face {
        font-family: ubuntu;
        src: url("{{asset('ubuntu.ttf')}}");
    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box !important;
        /*font-size: 18px;*/
        /*overflow-x: hidden !important;*/
    }
    p{
        font-size: 20px;
    }
    body{
        /*font-family: 'Roboto', sans-serif;*/
        /*font-family: Soleil,Arial,sans-serif;*/
        font-family: ubuntu sans-serif;
{{--        background-image: url('{{asset('bg_img/bg-3.jpg')}}');--}}
        box-sizing: border-box;;
    }
    *{
        /*border-radius: 0 !important;*/
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
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>
    <script src="{{asset('js/all.js')}}"></script>
    @yield('custom-js')
    @yield('script-after-all-things')
</body>
</html>
