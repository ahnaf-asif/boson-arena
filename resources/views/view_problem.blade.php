@extends('layouts.app')

@section('title')
{{$current_problem->name}}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/view-problem.css')}}">
@endsection


@section('content')

    <style>
        .confetti {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1000;
        }
        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 30px;
            background: #ffd300;
            top: 0;
            opacity: 0;
        }
        .confetti-piece:nth-child(1) {
            left: 7%;
            -webkit-transform: rotate(-40deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 182ms;
            -webkit-animation-duration: 1116ms;
        }
        .confetti-piece:nth-child(2) {
            left: 14%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 161ms;
            -webkit-animation-duration: 1076ms;
        }
        .confetti-piece:nth-child(3) {
            left: 21%;
            -webkit-transform: rotate(-51deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 481ms;
            -webkit-animation-duration: 1103ms;
        }
        .confetti-piece:nth-child(4) {
            left: 28%;
            -webkit-transform: rotate(61deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 334ms;
            -webkit-animation-duration: 708ms;
        }
        .confetti-piece:nth-child(5) {
            left: 35%;
            -webkit-transform: rotate(-52deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 302ms;
            -webkit-animation-duration: 776ms;
        }
        .confetti-piece:nth-child(6) {
            left: 42%;
            -webkit-transform: rotate(38deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 180ms;
            -webkit-animation-duration: 1168ms;
        }
        .confetti-piece:nth-child(7) {
            left: 49%;
            -webkit-transform: rotate(11deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 395ms;
            -webkit-animation-duration: 1200ms;
        }
        .confetti-piece:nth-child(8) {
            left: 56%;
            -webkit-transform: rotate(49deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 14ms;
            -webkit-animation-duration: 887ms;
        }
        .confetti-piece:nth-child(9) {
            left: 63%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 149ms;
            -webkit-animation-duration: 805ms;
        }
        .confetti-piece:nth-child(10) {
            left: 70%;
            -webkit-transform: rotate(10deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 351ms;
            -webkit-animation-duration: 1059ms;
        }
        .confetti-piece:nth-child(11) {
            left: 77%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 307ms;
            -webkit-animation-duration: 1132ms;
        }
        .confetti-piece:nth-child(12) {
            left: 84%;
            -webkit-transform: rotate(42deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 464ms;
            -webkit-animation-duration: 776ms;
        }
        .confetti-piece:nth-child(13) {
            left: 91%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }
        .confetti-piece:nth-child(odd) {
            background: #7431e8;
        }
        .confetti-piece:nth-child(even) {
            z-index: 1;
        }
        .confetti-piece:nth-child(4n) {
            width: 5px;
            height: 12px;
            -webkit-animation-duration: 2000ms;
        }
        .confetti-piece:nth-child(3n) {
            width: 3px;
            height: 10px;
            -webkit-animation-duration: 2500ms;
            -webkit-animation-delay: 1000ms;
        }
        .confetti-piece:nth-child(4n-7) {
            background: red;
        }
        @-webkit-keyframes makeItRain {
            from {opacity: 0;}
            50% {opacity: 1;}
            to {-webkit-transform: translateY(350px);}
        }
    </style>

    <div class="confetti" style="display:none;">
        @for($i = 0; $i <= 10;$i++)
            <div class="confetti-piece"></div>
        @endfor
    </div>

    @if(session('success'))
        <script>
            document.querySelector('.confetti').style.display='flex';
            setTimeout(()=>{
                document.querySelector('.confetti').style.display='none';
            }, 5000);
        </script>
    @endif


    <div class=" container preview-header py-3 mb-5">
        <div class="heading-text text-center">
            <h1 class="font-weight-bold mb-2">{{$current_problem->name}}</h1>
            <small>
                <span class="text-secondary font-weight-bold">{{$current_problem->subject->name}}</span>
            </small>
        </div>
    </div>
    <div class="container preview-problem">

        <div class="preview-body pb-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="description">
                        <div class="text-left" >
                            <select id="select_lang" onchange="return checkCurrentLang();" class="select_lang" aria-label="Default select example" style="border: 1px solid rgba(0,0,0,.125);">
                                <option value="en">English</option>
                                <option value="bn">বাংলা</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="description description-inside p-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
                        <div id="description_en_show" class="">
                            {!! $current_problem->description_en !!}
                        </div>
                        <div id="description_bn_show" style="display:none;">
                            {!! $current_problem->description_bn !!}
                        </div>
                    </div>



                </div>
                <div class="col-md-4">
                    <div class="details">

                        @if($current_problem->judging_method == 'automatic')
{{--                            <div class="card submit">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="font-weight-bold">Submit your solution</h5>--}}
                                    <form action="{{route('submit.problem')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="problem_id" value="{{$current_problem->id}}">
                                        <div class="input-group" style="width: 100%;">
                                            <div class="form-outline" style="width: 100%;">
                                                <input type="search" name="submission" id="submission" class="form-control" />
                                            </div>
                                            <button style="width: 100%; font-size: 17px; background: #315fa3;" type="submit" class="btn btn-primary mt-2">
                                                Submit
                                            </button>
                                        </div>

                                    </form>
{{--                                </div>--}}
{{--                            </div>--}}
                        @endif

                        <div class="statistics mt-5">
{{--                            <h3 class="font-weight-bold text-center text-success pb-2">Statistics</h3>--}}
                            <table class="table table-bordered" >
                                <tbody class="">
                                    <tr>
                                        <td>Score</td>
                                        <td class="text-center">{{$current_problem->score}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total submissions</td>
                                        <td class="text-center">{{$number_of_submissions}}</td>
                                    </tr>
                                    <tr>
                                        <td>Accepted submissions</td>
                                        <td class="text-center">{{$number_of_correct_submissions}}</td>
                                    </tr>
                                    <tr>
                                        <td>My status</td>
                                        <td class="text-center font-weight-bold">
                                            @if($user_status)
                                                <span class="text-success">
                                                    Solved
                                                </span>
                                            @else

                                            <span class="text-danger">Unsolved</span>

                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')
    <script src="{{asset('js/draft.js')}}"></script>
    @include('includes.mathjax')
@endsection
