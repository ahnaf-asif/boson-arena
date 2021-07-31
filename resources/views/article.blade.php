@extends('layouts.app')

@section('title')
    Article
@endsection

@section('custom-css')

@endsection


@section('content')

    <div class="container my-5">
        <h1 class="big-header">All Articles</h1>
        <hr>
        <div class="mb-5"></div>
        <div class="articles row">
            @foreach($all_articles as $article)
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card blog-card shadow-0">

                        <div class="bg-image hover-zoom">
                            <img
                                src="{{$article->og_image}}"
                                class="card-img-top"
                                alt="title image"
                            />
                        </div>
                        <div class="card-body position-relative" style="padding-left: 0; padding-right: 0;">

                            <div class="card-title">
                                <a href="{{route('view.article', ['id'=>$article->id])}}" class="blog-header-link"><h3 class="font-weight-bold">{!! $article->title !!}</h3></a>
                                <p><small>{{$article->author_name?$article->author_name:$article->user->name}} - {{$article->created_at->format('d M, Y')}}</small></p>
                            </div>
                            <p class="card-text">
                                {!! $article->short_description !!}
                            </p>
                            <a href="{{route('view.article', ['id'=>$article->id])}}" class="">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container">
                {{$all_articles->links()}}
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
