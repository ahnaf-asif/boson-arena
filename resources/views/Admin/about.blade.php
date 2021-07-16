@extends('Admin.layout.admin')

@section('title')
    About | Boson Admin
@endsection

@section('heading')
    About Us
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11">

                <div class="py-3 px-2 my-2 mb-5" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                    <form action="{{route('update.about')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
{{--                            <div class="col-md-1"></div>--}}
                            <div class="col-md-12">
{{--                                <label for="about" class="text-muted">SHORT DESCRIPTION</label>--}}
                                <textarea name="about" id="about" rows="30"  class="form-control trumbowyg">{!! $about->about !!}</textarea>
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
