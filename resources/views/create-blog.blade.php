@extends('layouts.app')

@section('title')
    Create Blog
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')

    <div class="container drafts bg-super-light py-4 shadow-2">

        <div class="form-header-h2 text-center mb-6">
            <h2 class="font-weight-bold">Create A New Blog</h2>
        </div>



        @error('short_description')
            <div class="alert alert-danger">
                Short Description can't have more then 500 characters.
            </div>
        @enderror

        <form action="{{route('create.blog')}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input value="{{ old('blog_title') }}" type="text" id="blog_title" name="blog_title" class="form-control" required/>
                <label class="form-label" for="blog_title" >Blog Title</label>
                @error('blog_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            @if (Auth::user()->hasRole('admin'))
                <div class="form-outline mb-4">
                    <input value="{{ Auth::user()->name }}" type="text" id="author_name" name="author_name" class="form-control" required/>
                    <label class="form-label" for="author_name" >Author Name</label>
                    @error('author_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @else
                <input type="hidden" name="author_name" value="{{Auth::user()->name}}">
            @endif



            <div class="mb-4">
                <label class="form-label" for="subjects" >Subject</label>
                <select name="subject" class="form-select" id="subjects">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="short_description">Short Description</label>
                <textarea required rows="4" name="short_description" id="short_description" class="form-control">{{ old('short_description') }}</textarea>

            </div>
            <div class="form-outline mb-4">
                <label for="blog">Blog</label>
                <textarea required name="blog" id="blog" class="trumbowyg" rows="30">
                    {{ old('blog') }}
                </textarea>
{{--                @error('blog')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                @enderror--}}
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
