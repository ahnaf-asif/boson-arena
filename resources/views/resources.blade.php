@extends('layouts.app')

@section('title')
    Resources
@endsection

@section('custom-css')

    <style>

    </style>

@endsection


@section('content')

    <div class="container my-5">
        <h1 class="big-header text-center">Resources</h1>
        <hr>
        <div class="mt-5"></div>
        <div class="resources">
            {!! $resources->resources !!}
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
