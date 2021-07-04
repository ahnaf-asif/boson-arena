@extends('layouts.app')


@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">
@endsection


@section('content')
    <div class="container drafts shadow-2 bg-super-light py-4">

        <div class="form-header-h2 text-center mb-6">
            <h2>Edit Problem</h2>
        </div>

        <form action="{{route('edit.problem.backend')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$current_problem->id}}">
            <div class="form-outline mb-4">
                <input type="text" id="problem_name" value="{!! $current_problem->name !!}" name="problem_name" class="form-control" />
                <label class="form-label" for="problem_name">Problem Name</label>
            </div>
            <div class="mb-4">
                <label class="form-label" for="evaluation_method" >Evaluation Method</label>
                <select name="evaluation_method" class="form-select" id="evaluation_method">
                    <option value="manual"
                    @if($current_problem->judging_method == 'manual')
                        selected
                    @endif
                    >Manual</option>
                    <option
                        @if($current_problem->judging_method == 'automatic')
                            selected
                        @endif
                        value="automatic">Automatic</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label" for="subjects" >Subject</label>
                <select name="subject" class="form-select" id="subjects">
                    @foreach($subjects as $subject)
                        <option
                            @if($current_problem->subject->id == $subject->id)
                            selected
                            @endif
                            value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="description_en">Description (English)</label>
                <textarea  name="description_en" id="description_en">
                    {{ $current_problem->description_en }}
                </textarea>
            </div>
            <div class="form-outline mb-4">
                <label for="description_bn">Description (বাংলা)</label>
                <textarea name="description_bn" id="description_bn">
                    {{ $current_problem->description_bn }}
                </textarea>
            </div>

            {{--            <input type="hidden" name="author" value="{{Auth::user()->id}}">--}}

            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-lg" value="Update">
            </div>
        </form>
    </div>
    @include('includes.toast-testing')
@endsection



@section('custom-js')

    <script src="{{asset('trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js')}}"></script>
    <script src="{{asset('trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js')}}"></script>
    <script src="{{asset('js/draft.js')}}"></script>
@endsection
