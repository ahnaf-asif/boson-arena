@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection

@section('title')
    Home
@endsection

@section('content')

{{--@include ('includes.banner')--}}
<div class="container">
    <div class="row" style="">
        <div class="col-lg-6" style="display: flex;align-items: center">
            <img style="width:100%;" src="{{asset('images/home-page-image.jpg')}}" alt="home-page-image">
        </div>
        <div class="col-lg-6 " style="display:flex;align-items:center;">
            <div class="message big-paragraph" style="color:#696969;">
                <h1 style="color:#696969" class=" pb-4 text-center big-header">Boson Biggan Sangho</h1>
                <div class="message-texts px-4">
                    <p>Welcome to our official page of Boson Biggan Sangho. We started our journey in 4th July 2014. It is open for School, College and University going students all over the country. We work on different olympiads, Scientific Magazine, publishing blogs and many other things. We organize Mega festivals, various Olympiads and competitions. We also organize camps and seminars.</p>
                    <p>We are affiliated with Bangladesh Mathematical Olympiad (BdMO). Bangladesh Mathematical Olympiad committee awarded us as the Best Math Club in 2019.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container mb-1">
    {{-- <img style="width:100%;height:auto;" src="{{asset('images/affiliated_bdmo3.png')}}" alt="Affiliated By BDMO"> --}}

    <div class="affiliated">
        <h1 class="text-center big-header">Our Affiliate</h1>
        <hr>
        <div class="text-center">
            <img src="{{asset('images/bdmo_logo.png')}}" alt="bdmo_logo">
        </div>
        <hr>
    </div>

</div>

@if(count($all_articles) != 0)

    <div class="latest-blogs container my-1 mb-5">
        <h1 class="big-header text-center mb-4">Latest Articles</h1>
        {{-- <hr> --}}
        <div class="row " style="row-gap: 1.5rem;">

            @foreach($all_articles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="card blog-card shadow-0">
                        {{--                        bg-image hover-zoom--}}
                        <div class="bg-image hover-zoom">
                            <img
                                src="{{$article->og_image}}"
                                class="card-img-top"
                                alt="title image"
                            />
                        </div>
                        <div class="card-body position-relative" style="padding-left: 0;padding-right: 0;">
                            <div class="card-title">
                                
                                
                                <a href="{{route('view.article', ['id'=>$article->id])}}" class="blog-header-link"><h3 class="font-weight-bold">{!! $article->title !!}</h3></a>

                                <p><small>{{$article->author_name?$article->author_name:$article->user->name}} - {{$article->created_at->format('d M, Y')}}</small></p>
                            </div>
                            <p class="card-text medium-paragraph">
                                {!! $article->short_description !!}
                            </p>
                            <a href="{{route('view.article', ['id'=>$article->id])}}" class="">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($all_articles) > 0)
                <div class="mb-3">
                    <p class="text-center">
                        <a href="{{route('article')}}" class="btn btn-black">All Articles</a>
                    </p>
                </div>
            @endif
        </div>
    </div>

@endif


@if(count($all_blogs) != 0)

    <div class="latest-blogs container my-2 mb-5">
        <h1 class="big-header text-center mb-4">Latest Blogs</h1>
        <hr>
        <div class="row " style="row-gap: 1.5rem;">

            @foreach($all_blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="card blog-card shadow-0">
{{--                        bg-image hover-zoom--}}
                        <div class="bg-image hover-zoom">
                            <img
                                src="{{$blog->og_image}}"
                                class="card-img-top"
                                alt="title image"
                            />
                        </div>
                        <div class="card-body position-relative" style="padding-left: 0;padding-right: 0;">
                            <span class="badge translate-middle bg-success blog-badge">{{$blog->subject->name}}</span>

                            <div class="card-title">
                                <a href="{{route('view.blog', ['id'=>$blog->id])}}" class="blog-header-link"><h3 class="font-weight-bold">{!! $blog->title !!}</h3></a>
                                <p><small>{{$blog->author_name?$blog->author_name:$blog->user->name}} - {{$blog->created_at->format('Y:m:d h:i a')}}</small></p>
                            </div>
                            <p class="card-text medium-paragraph">
                                {!! $blog->short_description !!}
                            </p>
                            <a href="{{route('view.blog', ['id'=>$blog->id])}}" class="">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($all_blogs) > 0)
                <div class="mb-3">
                    <p class="text-center">
                        <a href="{{route('blog')}}" class="btn btn-black">All Blogs</a>
                    </p>
                </div>
            @endif
        </div>
    </div>

@endif


@include('includes.toast-testing')
@endsection
