

@extends('layouts.app')

@section('title')

@endsection

@section('custom-css')

@endsection


@section('content')

    <div style="min-height: 100vh;">
        <div class="container">
            <form action="{{route('demo-upload')}}" method="post" enctype="multipart/form-data">
                @csrf

                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
