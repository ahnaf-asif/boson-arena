@extends('layouts.app')

@section('title')
    Create Article
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')

    <div class="container drafts bg-super-light py-4 shadow-2">

        <div class="form-header-h2 text-center mb-6">
            <h2 class="font-weight-bold">Create A New Article</h2>
        </div>



        @error('short_description')
        <div class="alert alert-danger">
            Short Description can't have more then 500 characters.
        </div>
        @enderror

        <form action="{{route('store.article')}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input value="{{ old('article_title') }}" type="text" id="article_title" name="article_title" class="form-control" required/>
                <label class="form-label" for="article_title" >Article Title</label>
                @error('article_title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group mb-4">
                <label for="short_description">Short Description</label>
                <textarea required rows="4" name="short_description" id="short_description" class="form-control">{{ old('short_description') }}</textarea>

            </div>
            <div class="form-outline mb-4">
                <label for="article">Article</label>
                <textarea required name="article" id="article" class="trumbowyg" rows="30">
                    {{ old('article') }}
                </textarea>

            </div>

            <input type="hidden" name="og_image" value="{{asset('images/default_og_image.jpg')}}">

            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-lg" value="Submit">
            </div>
        </form>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')
    <script src="{{asset('trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js')}}"></script>
    <script src="{{asset('trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js')}}"></script>
    <script src="{{asset('js/blog.js')}}"></script>
@endsection
