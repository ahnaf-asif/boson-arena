@extends('layouts.app')

@section('title')
    Problems
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/problems.css')}}">
@endsection


@section('content')

    <div class="container problems bg-light shadow-2 mt-3 py-3">
        <div class="problems-header">
            @include('includes.problems-section-heading')
        </div>
        <div class="problems-body mt-5">
            @if($searched)
                <a href="{{route('problems')}}" class="btn btn-danger btn-rounded btn-sm mb-2">show All Problems</a>
            @endif
            <div class="row">
                <div class="col-md-8 mb-3">
                    @include('includes.show-all-problems')
                </div>
                <div class="col-md-4">
                    @include('includes.normal-problems-options')
                    @include('includes.overall-score-ranklist')
                </div>
            </div>
        </div>
    </div>


    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
