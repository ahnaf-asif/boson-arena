@extends('layouts.app')

@section('title')
    Article Draft
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')

    <div class="container bg-super-light py-3">
        <div class="heading mb-4">
            My Articles
        </div>
        <div class="blog-header pb-3 mb-5">
            <a class="new btn btn-info" href="{{route('create.article')}}">
                NEW Article
            </a>
            <div class="search">
                <form action="{{route('article.draft.search')}}" method="GET">
                    {{--                    @csrf--}}
                    <div class="input-group bg-super-light search-draft">
                        <div class="form-outline search-draft-input">
                            <input type="search" name="search" id="search_string" class="form-control" />
                            <label class="form-label" for="search">Search</label>
                        </div>
                        <button type="submit" class="btn btn-info search-draft-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" mt-4 blog-body">
            @if(count($all_articles) == 0)
                <h2>No Articles Found</h2>
            @else
                <ul class="list-group">
                    @if(isset($searched))
                        <a href="{{route('article.draft')}}" class="btn btn-sm btn-rounded btn-danger" style="width: 100px;">All Articles</a>
                    @endif
                    @foreach($all_articles as $article)
                        <a href="{{route('show.article', ['id'=>$article->id])}}" class="blog-link">
                            <li class="list-group-item blog-list-item my-2 py-3">
                                <div class="title">
                                    {!! $article->title !!}
                                </div>
                                <div class="details">
                                    <small style="font-size: 13px;" class="text-muted"> {{$article->created_at->format('Y:m:d h:i a')}}</small>
                                </div>
                                @if($article->archive == 1)
                                    <div class="text-right font-italic">
                                        <small style="font-size: 13px;" class="text-muted">added to archive</small>
                                    </div>
                                @endif
                                {{--                            <div class="mt-3" style="font-weight: normal;">--}}
                                {{--                                {!! $blog->short_description !!}--}}
                                {{--                            </div>--}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="container">
            {{$all_articles->links()}}
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
