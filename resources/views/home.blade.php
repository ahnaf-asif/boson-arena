@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

{{--@include ('includes.banner')--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.intro-card')
        </div>
{{--        <p>\u09ac\u09a1\u09bc \u09ac\u09be\u09ac\u09be \u09a1\u09bf \u0986\u09b8\u099b\u09c7\u09a8 \u09ae\u09be\u09a8\u09c1\u09b7\u0964 \u0986\u09ae\u09b0\u09be \u0996\u09c1\u09b6\u09bf\u0964 \u09b8\u0995\u09b2\u09c7\u0987 \u09b8\u09c7\u0987 \u09ae\u09be\u09a6\u09be\u09b0\u09ab\u09be\u0995\u09bf\u0982 \u09b8\u09cd\u099f\u09be\u09ab \u09a8\u09bf\u09af\u09bc\u09c7 \u0996\u09c1\u09b6\u09bf\u0964 \u099a\u09b2 \u09a6\u09c7\u0996\u09bf \u0995\u09bf \u0998\u099f\u09c7\u099b\u09c7.<br></p>--}}
    </div>
</div>
@include('includes.toast-testing')
@endsection
