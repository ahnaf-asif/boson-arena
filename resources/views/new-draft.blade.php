@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">

@endsection


@section('content')
    <div class="container drafts shadow-2">

        <div class="form-header-h2 text-center mb-6">
            <h2>Create A New Problem</h2>
        </div>

        <form action="{{route('create.draft.backend')}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input type="text" id="problem_name" name="problem_name" class="form-control" />
                <label class="form-label" for="problem_name">Problem Name</label>
            </div>
            <div class="mb-4">
                <label class="form-label" for="evaluation_method" >Evaluation Method</label>
                <select name="evaluation_method" class="form-select" id="evaluation_method">
                    <option value="manual" selected>Manual</option>
                    <option value="automatic">Automatic</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label" for="subjects" >Subject</label>
                <select name="subject" class="form-select" id="subjects">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="description_en">Description (English)</label>
                <textarea name="description_en" id="description_en"></textarea>
            </div>
            <div class="form-outline mb-4">
                <label for="description_bn">Description (বাংলা)</label>
                <textarea name="description_bn" id="description_bn"></textarea>
            </div>

{{--            <input type="hidden" name="author" value="{{Auth::user()->id}}">--}}

            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-lg" value="Submit">
            </div>
        </form>
    </div>
@endsection



@section('custom-js')

    <script src="{{asset('trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js')}}"></script>
    <script src="{{asset('trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js')}}"></script>
    <script src="{{asset('js/draft.js')}}"></script>
@endsection
