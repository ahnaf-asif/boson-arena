@extends('layouts.app')

@section('title')
    Draft - {{$current_problem->name}}
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/preview-draft.css')}}">
@endsection


@section('content')
    @include('includes.delete-problem-modal')

    <div class="container mt-4 py-3 preview-problem">
        <div class="preview-header mb-5">
            <div class="heading-text text-center">
                <h1 class="font-weight-bolder mb-2">{{$current_problem->name}}</h1>
                <small>
                    Subject: <span class="text-secondary font-weight-bold">{{$current_problem->subject->name}}</span>
                    ( <span class=" font-weight-bold
                        @if($current_problem->judging_method == 'automatic')
                            text-success
                        @else
                            text-danger
                        @endif
                    ">{{$current_problem->judging_method}}</span> )
                </small>
            </div>
        </div>
        <div class="preview-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="description">
                        <div class="text-right">
                            <select id="select_lang" onchange="return checkCurrentLang();" class="" aria-label="Default select example">
                                <option value="en">English</option>
                                <option value="bn">বাংলা</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="description description-inside px-2 py-2 pb-4 p-md-4" style="min-height: 50vh;">
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
                        <a href="{{route('draft')}}" class="btn btn-black preview-problem-btn mb-2 rounded-0" type="button">Back To My Draft</a>
                        @include('includes.problem-identifier')
                        @if($current_problem->judging_method == 'automatic')
                            <div class="submit py-3">
                                <h5 class="font-weight-bold">Test your solution</h5>
                                <form action="{{route('test.submit')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="problem_id" value="{{$current_problem->id}}">
                                    <div class="input-group" style="width: 100%;">
                                        <div class="form-outline" style="width: 60%;">
                                            <input type="search" name="submission" id="submission" class="form-control rounded-0" />
                                        </div>
                                        <button style="width: 40%;" type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>

                                </form>
                            </div>
                            @if($current_problem->archive == false)
                                <a href="{{route('add.remove.archive', ['problem'=>$current_problem->id, 'type'=>1])}}" class="btn btn-success preview-problem-btn" type="button">Add to archive</a>
                            @else
                                <a href="{{route('add.remove.archive', ['problem'=>$current_problem->id, 'type'=>0])}}" class="btn btn-warning preview-problem-btn" type="button">Remove from archive</a>
                            @endif
                        @endif
                        <a href="{{route('edit.problem', ['id'=>$current_problem->id])}}" class="btn btn-secondary preview-problem-btn" type="button">Edit Problem</a>
                        <button
                            class="btn btn-danger preview-problem-btn"
                            type="button"
                            data-mdb-toggle="modal"
                            data-mdb-target="#deleteProblem"
                        >Delete Problem</button>
                        @if($current_problem->judging_method == 'automatic')
                            @include('includes.draft-problem-solutions')
                        @endif
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
