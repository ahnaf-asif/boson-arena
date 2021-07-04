@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/view-problem.css')}}">
@endsection


@section('content')

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
                        <div class="text-left">
                            <select id="select_lang" onchange="return checkCurrentLang();" class="select_lang" aria-label="Default select example">
                                <option value="en">English</option>
                                <option value="bn">বাংলা</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="description description-inside py-2 pb-4" style="min-height: 50vh;">
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
