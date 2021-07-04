@extends('layouts.app')

@section('custom-css')
{{--    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">--}}
@endsection


@section('content')

    <div class="container drafts ">
        {{--        <hr>--}}
        <div class="drafts-header container">
            <div class="name">
                <h3 style="font-weight: bolder;">{!! $current_problem->name !!}</h3>
            </div>
            <div class="new">
                <a href="{{route('draft')}}" class="btn btn-outline-black create-draft">My Draft</a>
            </div>
        </div>

        <div class="container-fluid draft-body">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-group pt-3">
                        <li class="list-group-item problem-details">
                            <div class="left">
                                Subject : <b class="text-secondary">{{$current_problem->subject->name}}</b>
                            </div>
                            <div class="right">
                                Evaluation Method: <b class="
                                    @if($current_problem->judging_method == 'manual')
                                        text-danger
                                    @else
                                        text-success
                                    @endif
                                ">{{$current_problem->judging_method}}</b>
                            </div>
                        </li>
                    </ul>
                    <div class="text-right">
                        <select id="select_lang" onchange="return checkCurrentLang();" class="select my-3" aria-label="Default select example">
                            <option value="en">English</option>
                            <option value="bn">বাংলা</option>
                        </select>
                    </div>
                    <div class="description shadow-3 py-4" style="min-height: 50vh;">
                        <div id="description_en_show" class="">
                            {!! $current_problem->description_en !!}
                        </div>
                        <div id="description_bn_show" style="display:none;">
                            {!! $current_problem->description_bn !!}
                        </div>
                    </div>


                </div>
                <div class="right-col-problem-desc col-md-4 pt-3">
                    @include('includes.problem-identifier')
                    <div class="d-grid gap-2">
                        <a href="{{route('edit.problem', ['id'=>$current_problem->id])}}" class="btn btn-secondary" type="button">Edit Problem</a>
                        <button
                            class="btn btn-danger"
                            type="button"
                            data-mdb-toggle="modal"
                            data-mdb-target="#deleteProblem"
                        >Delete Problem</button>

                        @include('includes.delete-problem-modal')

                        @if($current_problem->judging_method == 'automatic')
                            @include('includes.draft-problem-solutions')
                        @endif
                    </div>
                    @if($current_problem->judging_method == 'automatic')
                        <div class="submit mt-4 shadow-2 py-5">
                            <h5 class="font-weight-bold">Test your solution</h5>
                            <form action="{{route('test.submit')}}" method="POST">
                                @csrf
                                <input type="hidden" name="problem_id" value="{{$current_problem->id}}">
                                <div class="input-group" style="width: 100%;">
                                    <div class="form-outline" style="width: 60%;">
                                        <input type="search" name="submission" id="submission" class="form-control" />
                                    </div>
                                    <button style="width: 40%;" type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>

                            </form>
                        </div>
                    @endif
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
