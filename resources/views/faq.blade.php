@extends('layouts.app')

@section('title')
    FAQ | Boson
@endsection

@section('custom-css')
    <style>

    </style>
@endsection


@section('content')

    <div class="container my-5">
        <h1 class="big-header text-center">Frequently Asked Questions</h1>
        <hr>
        <div class="mt-5"></div>
        <div class="faq">
            {!! $faq->faq !!}
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
