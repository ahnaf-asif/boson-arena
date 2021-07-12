@extends('layouts.app')

@section('title')

@endsection

@section('custom-css')
{{--    <link rel="stylesheet" href="{{asset('css/lightbox/mdb.min.css')}}" />--}}
    <!-- PRISM -->
    <link rel="stylesheet" href="{{asset('css/lightbox/new-prism.css')}}" />
    <!-- Styles -->
@endsection


@section('content')



    <div class="container my-5">
        <h1 class="big-header text-center">This is the title of the gallery</h1>
        <div class="lightbox mt-5">
            <div class="row" style="row-gap: 1.5rem;">
                @for($i = 0; $i < 10;$i++)

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                        <img src="https://mdbootstrap.com/img/Photos/Thumbnails/Slides/1.jpg" data-mdb-img="https://mdbootstrap.com/img/Photos/Slides/1.jpg" alt="Lightbox image 1" class="w-100">
                    </div>

                @endfor
            </div>
        </div>
    </div>




    @include('includes.toast-testing')
@endsection



@section('custom-js')

    <script type="text/javascript" src="{{asset('js/lightbox/new-prism.js')}}"></script>
    <!-- MDB SNIPPET -->
    <script type="text/javascript" src="{{asset('js/lightbox/mdbsnippet.min.js')}}"></script>
    <!-- MDB -->
{{--    <script type="text/javascript" src="{{asset('js/lightbox/mdb.min.js')}}"></script>--}}
    <!-- Custom scripts -->
    <script type="text/javascript">
        var lightbox = document.getElementById('lightbox');
        var lightboxInstance = mdb.Lightbox.getInstance(lightbox);
        var lightboxToggler = document.getElementById('lightboxToggler');
        lightboxToggler.addEventListener('click', function () {
            lightboxInstance.open(12);
        });
    </script>

@endsection
