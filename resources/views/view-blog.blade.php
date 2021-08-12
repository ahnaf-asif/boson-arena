@extends('layouts.app')

@section('additional-meta')
    <meta property="og:url"                content="{{route('view.blog', ['id' => $current_blog->id])}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{!! $current_blog->title !!}" />
    <meta property="og:image"              content="{{$current_blog->og_image}}" />
@endsection

@section('title')
    View - {!! $current_blog->title !!}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <style>
        .article-sidebar{
            text-decoration: none;
            color: black;
        }
        .article-sidebar:hover{
            text-decoration: none;
        }
        .article-sidebar-inside:hover{
            background: #e8e8e8;
        }
    </style>
@endsection


@section('content')

    <div class="container py-4 my-4  shadow-1">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-body">
                    <div class="single-blog-header">
                        <h2 class="font-weight-bold text-center">{!! $current_blog->title !!}</h2>
                        <p class="text-muted text-center"><small style="font-size: 13px;">{{$current_blog->author_name?$current_blog->author_name:$current_blog->user->name}}, {{$current_blog->created_at->format('Y:m:d h:i a')}}, <span class="font-weight-bold">{{$current_blog->subject->name}}</span></small></p>
                    </div>
                    <div class="body mt-5" style="max-width:100% !important;">
                        <div class="preview-image-blog mb-4">
                            <img src="{{$current_blog->og_image}}" alt="preview-image" style="width: 100%;">
                        </div>
                        {!! $current_blog->blog !!}
                    </div>
                    <div class="something my-4">
                        <div class="fb-comments" data-href="{{route('view.blog', ['id'=>$current_blog->id])}}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <h3>Like And Share</h3>
                <hr>
                <div class="facebook-share my-3" style="display: flex;justify-content: center;">
                    <div class="fb-like" data-href="{{route('view.blog', ['id'=>$current_blog->id])}}" data-width="" data-layout="box_count" data-action="like" data-size="large" data-share="true"></div>
                </div>

                <h3>Related Blogs</h3>
                <hr>

                @foreach($related_blogs as $lst)
                    <a href="{{route('view.blog', ['id' => $lst->id])}}" class="article-sidebar">
                        <div class="row article-sidebar-inside my-3 align-items-center">
                            <div class="col-5">
                                <img src="{{$lst->og_image}}" alt="title_image" class="w-100">
                            </div>
                            <div class="col-7">
                                <p>
                                    <small>{{$lst->created_at->format('d M, Y')}}</small><br>
                                    <span class="font-weight-bold">{!! $lst->title !!}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection


@section('custom-js')
    @include('includes.mathjax')
@endsection
