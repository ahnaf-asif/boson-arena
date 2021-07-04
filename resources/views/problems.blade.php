@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/problems.css')}}">
@endsection


@section('content')

    <div class="container problems bg-light shadow-2 mt-3 py-3">
        <div class="problems-header">
            <div class="heading">
                <h1 class="font-weight-bolder">Problems
                    @if(isset($_GET['page']))
                        (page {{$_GET['page']}})
                    @endif
                </h1>
            </div>
            <div class="search">
                <form action="{{route('search.problem.problems')}}" method="GET">
                    {{--                    @csrf--}}
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" name="search" id="search_string" class="form-control" />
                            <label class="form-label" for="search_string">Search</label>
                        </div>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="problems-body mt-5">
            @if($searched)
                <a href="{{route('problems')}}" class="btn btn-danger btn-rounded btn-sm mb-2">show All Problems</a>
            @endif
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="">
                        <ul class="list-group">

                            @if(count($all_problems) == 0)
                                <h4 class="text-muted">No Problems available</h4>
                            @endif
                            <?php $indx = 0; ?>
                            @foreach($all_problems as $problem)
                                <a class="problems-link my-2" href="{{route('show.problem',['id'=>$problem->id])}}">
                                    <li class="
                                        list-group-item py-4
                                        @if($solved[$indx++])
                                            solved
                                        @endif
                                    " style="font-size: 20px;">{!! $problem->name !!}</li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="my-3">
                        {{$all_problems->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="py-3 px-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                        <p class="font-weight-bold">Filter By Subject</p>
                        <hr>
                        <form action="{{route('filter.by.subject')}}" method="GET">
                            @foreach($subjects as $sub)
                                <div class="form-check pt-3">
                                    <input
                                        name="filtered_subjects[]"
                                        type="checkbox"
                                        id="subject{{$sub->id}}"
                                        value="{{$sub->id}}"
                                        class="form-check-input"
                                        @foreach($already_filtered as $ff)
                                            @if($ff == $sub->id)
                                                checked
                                            @endif
                                        @endforeach
                                        >
                                    <label for="subject{{$sub->id}}" class="form-check-label">{{$sub->name}}</label>
                                </div>
                            @endforeach
                            <div class="mt-3 flex-row justify-content-between">
                                <button class="btn btn-primary" type="submit">Filter Problems</button>
                                <a href="{{route('problems')}}" class="btn btn-success">All Problems</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
