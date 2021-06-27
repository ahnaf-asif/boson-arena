@extends('layouts.app')

@section('custom-css')

@endsection


@section('content')

    <div class="container text-light bg-dark">
        {!! $current_problem->description_bn !!}
    </div>





@endsection



@section('custom-js')


@endsection
