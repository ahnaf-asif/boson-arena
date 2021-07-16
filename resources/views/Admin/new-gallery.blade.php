@extends('Admin.layout.admin')

@section('title')
    New Gallery | Boson Admin
@endsection

@section('heading')
    Add A New Gallery
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="py-3 px-2 my-2 mb-5" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                    <form action="{{route('admin.add.new.gallery')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <label for="message" class="text-muted">TITLE</label>
                                <input type="text" name="title" id="message" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <label for="cover_pic" class="text-muted">COVER PICTURE</label>
                                <input type="file" name="cover_pic" id="cover_pic" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <label for="short_description" class="text-muted">SHORT DESCRIPTION</label>
                                <textarea name="short_description" id="short_description" rows="8" class="form-control"></textarea>
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
    </div>
@endsection
