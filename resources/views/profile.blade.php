@extends('layouts.app')

@section('title')
    Profile - {{Auth::user()->username}}
@endsection

@section('custom-css')

@endsection


@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <div class="profile-details">
                    @include ('includes.user-profile-details')
                </div>
            </div>
            <div class="col-md-7">
                <div class="statistics">
                    @include('includes.user-statistics')
                </div>
            </div>

        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
