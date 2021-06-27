@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">
@endsection


@section('content')
    <div class="container drafts shadow-2">
{{--        <hr>--}}
        <div class="drafts-header">
            <div class="draft-head">My Drafts</div>
            <div class="new">
                <a href="{{route('create.draft')}}" class="btn btn-success create-draft">New Draft</a>
            </div>
        </div>
{{--        {{$problems}}--}}
        <div class="all-drafts">
{{--            <div class="no-drafts">--}}
{{--                <h2 class="text-muted my-5">No Draft added yet</h2>--}}
{{--            </div>--}}
            <ul class="list-group">
                @foreach($problems as $problem)
                    <li class="list-group-item draft-problem">
                        <div class="problem-name">{!! $problem->name !!}</div>
                        <div class="problem-details">Details</div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection



@section('custom-js')

@endsection
