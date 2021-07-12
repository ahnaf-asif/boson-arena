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
@endsection


@section('content')

    <div class="container py-4 my-4  shadow-1">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-body">
                    <div class="single-blog-header">
                        <h2 class="font-weight-bold text-center">{!! $current_blog->title !!}</h2>
                        <p class="text-muted text-center"><small style="font-size: 13px;">{{$current_blog->user->name}}, {{$current_blog->created_at->format('Y:m:d h:i a')}}, <span class="font-weight-bold">{{$current_blog->subject->name}}</span></small></p>
                    </div>
                    <div class="body mt-5">
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

                <div class="blog-others px-3 py-4">
                    <div class="fb-like" data-href="{{route('view.blog', ['id'=>$current_blog->id])}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                </div>
                <div class="blog-others mt-3 px-3 py-4">
                    <h4 class="font-weight-bold">Related Blogs</h4>
                    <hr>
                    @if(count($related_blogs) == 0)
                        <p class="text-muted">No Related blog is found</p>
                    @else
                        @foreach($related_blogs as $rb)
                            <ul>
                                <a href="{{route('view.blog', ['id'=>$rb->id])}}" class="link-related-blog">
                                    <li class="mt-3">{!! $rb->title !!}</li>
                                </a>
                            </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
