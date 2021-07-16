@extends('Admin.layout.admin')

@section('title')
    Gallery | Boson Admin
@endsection

@section('heading')
    {!! $gallery->title !!}
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="py-3 px-2 my-2 mb-5" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                    <form action="{{route('admin.add.new.gallery-image')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"name="id" value="{{$gallery->id}}">
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <label for="title" class="text-muted">TITLE</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <label for="image" class="text-muted">ADD PICTURE</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9 text-center">
                                <input type="submit" class="btn btn-black" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="container pb-5">
            <div class="lightbox">
                <div class="row" style="row-gap: 1.5rem;">
                    @foreach($gallery->galleryImages as $img)

                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <div class="img-wrapper-dd" style="overflow:hidden;width:100%;max-height:150px;">
                                <img src="{{$img->image_link}}" data-mdb-img="{{$img->image_link}}" alt="{{$img->title}}" class="w-100">
                            </div>
                            <p class="text-center text-muted">{{$img->title}}<br>
                                <a href="{{route('delete.gallery.image', ['id' => $img->id, 'gallery_id' => $gallery->id])}}" class="btn btn-sm btn-danger">Delete</a>
                            </p>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
