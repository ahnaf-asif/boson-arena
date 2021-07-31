@extends('layouts.app')

@section('title')
    Edit Article
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/blog-draft.css')}}">
@endsection


@section('content')


    <div class="container drafts bg-super-light py-4 shadow-2">

        <div class="form-header-h2 text-center mb-6">
            <h2 class="font-weight-bold">Edit Your Article</h2>
        </div>



        @error('short_description')
        <div class="alert alert-danger">
            Short Description can't have more then 500 characters.
        </div>
        @enderror

        <form action="{{route('update.article', ['id' => $current_article->id])}}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input value="{{ $current_article->title }}" type="text" id="article_title" name="article_title" class="form-control" required/>
                <label class="form-label" for="article_title" >Article Title</label>
                @error('article_title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if (Auth::user()->hasRole('admin'))
                <div class="form-outline mb-4">
                    <input value="{{ $current_article->author_name }}" type="text" id="author_name" name="author_name" class="form-control" required/>
                    <label class="form-label" for="author_name" >Author Name</label>
                    @error('author_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @else
                <input type="hidden" name="author_name" value="{{Auth::user()->name}}">
            @endif


            <div class="form-group mb-4">
                <label for="short_description">Short Description (at most 500 characters)</label>
                <textarea required rows="4" name="short_description" id="short_description" class="form-control">{{ $current_article->short_description }}</textarea>

            </div>
            <div class="form-group mb-4">
                <label for="article">Article</label>
                <textarea required rows="30" name="article" id="article" class="form-control">{{ $current_article->article }}</textarea>

            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-lg" value="UPDATE">
            </div>
        </form>
    </div>

    @include('includes.toast-testing')
@endsection



@section('custom-js')
    <script src="{{asset('trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js')}}"></script>
    <script src="{{asset('trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js')}}"></script>
    <script>
        $('#article').trumbowyg({
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['image'], // Our fresh created dropdown
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
            plugins: {
                resizimg: {
                    minSize: 64,
                    step: 16,
                },
                upload: {
                    serverPath: 'https://api.imgur.com/3/image',
                    fileFieldName: 'image',
                    headers: {
                        'Authorization': 'Client-ID 188d8dd42673a9d'
                    },
                    urlPropertyName: 'data.link'
                }
            }
        });
    </script>
@endsection
