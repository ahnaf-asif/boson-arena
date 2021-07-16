@extends('layouts.app')

@section('title')
    Preview - {{$current_article->title}}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')
{{--    @include('includes.delete-blog-modal')--}}
    <div class="container py-3 bg-super-light">
        <div class="preview-blog-header mb-5">
            <h1 class="text-center">{!! $current_article->title !!}</h1>
            <p class="text-muted text-center">
                <small>{{$current_article->created_at->format('y-m-d h:i a')}} </small>
            </p>
        </div>
        <div class="preview-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-short-description mb-3 p-3">
                        <h3>Short Description</h3>
                        <hr>
                        {!! $current_article->short_description !!}
                    </div>
                    <div class="blog-description mb-5 p-3">
                        <h3>Main Article</h3>
                        <hr>
                        {!! $current_article->article !!}
                    </div>
                </div>
                <div class="col-md-4">

{{--                    @include('includes.update-preview-image')--}}

                    <div class="blog-options">

                        <div class="py-3 px-2 my-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                            <h4 class="font-weight-bold">Article Options</h4>
                            <hr>
                            <a href="{{route('edit.article', ['id' => $current_article->id])}}"
                               class="btn btn-secondary btn-long">Edit</a>
                            <button
                                class="btn btn-danger btn-long mt-2"
                                type="button"
                                data-mdb-toggle="modal"
                                data-mdb-target="#deleteBlog"
                            >Delete</button>

                            @if($current_article->archive == 0)
                                <a href="{{route('add.remove.archive.blog', ['id' => $current_article->id, 'type' => 1])}}"
                                   class="btn btn-success btn-long mt-2">Add to archive</a>
                            @else
                                <a href="{{route('add.remove.archive.blog', ['id' => $current_article->id, 'type' => 0])}}"
                                   class="btn btn-warning btn-long mt-2">Remove From Archive</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')
    <script src="{{asset('js/blog.js')}}"></script>
@endsection
