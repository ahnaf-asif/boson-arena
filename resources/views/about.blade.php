@extends('layouts.app')

@section('title')
    About | Boson
@endsection

@section('custom-css')

@endsection


@section('content')

    <div class="container">
        <h1 class="mt-5 big-header text-center">About Us</h1>
        <hr>
        <div class="mt-5"></div>
        {!! $about->about !!}
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
