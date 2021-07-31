@extends('layouts.app')

@section('title')
{!! $article->title !!}
@endsection

@section('additional-meta')
    <meta property="og:url"                content="{{route('view.article', ['id' => $article->id])}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{!! $article->title !!}" />
    <meta property="og:image"              content="{{$article->og_image}}" />
@endsection

@section('custom-css')
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

    <div class="container my-5">
        <h1 class="big-header">{!! $article->title !!}</h1>
        <p><small>{{$article->author_name?$article->author_name:$article->user->name}} - {{$article->created_at->format('d M, Y')}}</small></p>
        <hr>
        <div class="mb-1"></div>
        <div class="articles row">
            <div class="col-md-8">
                <div class="og_img mb-2">
                    <img src="{{$article->og_image}}" alt="title_image" class="w-100">
                </div>
                {!! $article->article !!}
                <div class="something my-4">
                    <div class="fb-comments" data-href="{{route('view.article', ['id'=>$article->id])}}" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Like And Share</h3>
                <hr>
                <div class="facebook-share my-3" style="display: flex;justify-content: center;">
                    <div class="fb-like" data-href="{{route('view.article', ['id'=>$article->id])}}" data-width="" data-layout="box_count" data-action="like" data-size="large" data-share="true"></div>
                </div>

                <h3>Recent Articles</h3>
                <hr>

                    @foreach($last_ten as $lst)
                    <a href="{{route('view.article', ['id' => $lst->id])}}" class="article-sidebar">
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

@endsection
