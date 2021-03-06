@extends('layouts.app')

@section('title')
    Gallery
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/gallery.css')}}">
@endsection


@section('content')

    <div class="container my-5">
        <h1 class="text-center big-header my-5">Our Gallery</h1>
        <div class="row" style="row-gap: 1.5rem;">
            @foreach($galleries as $gl)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                    <div class="gallery-preview-wrapper">
                        <div class="bg-image ripple " data-mdb-ripple-color="light">
                            <div class="gallery-bg gallery-cover-picture">
                                    <img src="{{$gl->cover_pic}}" class="w-100 gallery-preview-img" />
                            </div>
                            <a href="{{route('view.gallery', ['id' => $gl->id])}}">
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="inside">
                                            <h5 style="width: 15ch;" class="text-center text-white">{!! $gl->title !!}</h5>
                                            <p style="color: yellow !important;" class="text-center text-white mb-0"><small>{{$gl->galleryImages->count()}} Pictures</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>


    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
