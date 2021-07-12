@extends('layouts.app')

@section('title')
    Edit Blog - {!! $current_blog->title !!}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')

    <div class="container drafts bg-super-light py-4 shadow-2">

        <div class="form-header-h2 text-center mb-6">
            <h2 class="font-weight-bold">Edit Blog</h2>
        </div>

        <form action="{{route('update.blog')}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input value="{!! $current_blog->title !!}" type="text" id="blog_title" name="blog_title" class="form-control" required/>
                <label class="form-label" for="blog_title" >Blog Title</label>
            </div>

            <div class="mb-4">
                <label class="form-label" for="subjects" >Subject</label>
                <select name="subject" class="form-select" id="subjects">
                    @foreach($subjects as $subject)
                        <option
                            @if($current_blog->subject->id == $subject->id)
                                selected
                            @endif
                            value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="short_description">Short Description</label>
                <textarea rows="4" name="short_description" id="short_description" class="form-control">{!!  $current_blog->short_description !!}</textarea>
            </div>
            <div class="form-outline mb-4">
                <label for="blog">Blog</label>
                <textarea name="blog" id="blog" class="trumbowyg">
                    {!! $current_blog->blog !!}
                </textarea>
            </div>

            <input type="hidden" name="blog_id" value="{{$current_blog->id}}">

            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-lg" value="Update">
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
