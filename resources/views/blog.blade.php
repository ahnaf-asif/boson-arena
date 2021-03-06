@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection


@section('content')

    <div class="container py-3">


        <div class="blog-header pb-3 mb-5" style="border-bottom: 2px solid green;">
            <div class="heading">
                Blog Posts
            </div>
            <div class="search">
                <form action="{{route('blog.search')}}" method="GET">
                    {{--                    @csrf--}}
                    <div class="input-group bg-super-light search-draft">
                        <div class="form-outline search-draft-input">
                            <input type="search" name="search" id="search_string" class="form-control"
                                @if(isset($search))
                                    value="{{$search}}"
                                @endif
                            />
                            <label class="form-label" for="search_string">Search</label>
                        </div>
                        <button type="submit" class="btn btn-info search-draft-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <div class="blog-body">
            <div class="row">
                <div class="col-md-8 ">
                    @include('includes.all-blogs')
                </div>
                <div class="col-md-4">
                    @include('includes.blog-options-details')
                </div>
            </div>
        </div>
    </div>



    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
