@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('custom-css-js')

@endsection

@section('content')

    @if(Auth::user()->username == $username)
    <div class="container-fluid">
        @if(session('message'))
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="text-center">
                    <strong class="text-center">{{session('message')}}</strong>
                </div>
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
            </div>
        </div>
        @endif
        <div class="row">
            <div class=" col-12 col-sm-12 col-md-6 col-lg-5" style="margin-bottom: 20px;">
                @include('includes.user-profile-details')
            </div>
            <div class=" col-12 col-sm-12 col-md-6 col-lg-7">
                @include('includes.user-statistics')
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('You are not allowed to see this page') }}</div>

                        <div class="card-body">
                            <p class="text-danger font-weight-bold">Unfortunately, you are not allowed to see the contents of this page. Please <a href="{{route('home')}}">Go Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('includes.toast-testing')
@endsection
