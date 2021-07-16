@extends('layouts.app')

@section('title')
{{$gallery->title}} | Boson
@endsection

@section('custom-css')
{{--    <link rel="stylesheet" href="{{asset('css/lightbox/mdb.min.css')}}" />--}}
    <!-- PRISM -->
    <link rel="stylesheet" href="{{asset('css/lightbox/new-prism.css')}}" />
    <!-- Styles -->
@endsection


@section('content')



    <div class="container my-5">
        <h1 class="big-header text-center">{{$gallery->title}}</h1>
        <div class="lightbox mt-5">
            <div class="row" style="row-gap: 1.5rem;">
                @foreach($gallery->galleryImages as $img)

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="gallery-cover-picture">
                            <img src="{{$img->image_link}}" data-mdb-img="{{$img->image_link}}" alt="{{$img->title}}" class="w-100">
                        </div>
                        <p class="text-center text-muted">{{$img->title}}</p>
                    </div>

                @endforeach
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
