@extends('Admin.layout.admin')

@section('title')
    Gallery
@endsection

@section('heading')
Gallery
@endsection

@section('content')
    <div class="container my-5">
        <div class="new-gallery mb-3">
            <a href="{{route('admin.new.gallery')}}" class="btn btn-secondary">New Gallery</a>
        </div>
        <div class="row" style="row-gap: 1.5rem;">
            @foreach($galleries as $gal)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                    <div class="gallery-preview-wrapper">
                        <div class="bg-image ripple " data-mdb-ripple-color="light">
                            <div class="gallery-bg" style="height:150px;overflow:hidden;">
                                <img src="{{$gal->cover_pic}}" class="w-100 gallery-preview-img"  alt="cover-pic"/>
                            </div>
                            <a href="{{route('admin.view.gallery', ['id' => $gal->id])}}">
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="inside">
                                            <h5 style="width: 15ch;" class="text-center text-white">{!! $gal->title !!}</h5>
                                            <p style="color: yellow !important;" class="text-center text-white mb-0"><small>{{$gal->galleryImages->count()}} Images</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </div>
                            </a>
                        </div>
                        <p class="text-center mt-2">
                            <a href="{{route('admin.delete.gallery', ['id' => $gal->id])}}" class="btn btn-sm btn-danger">Delete</a>
                        </p>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
