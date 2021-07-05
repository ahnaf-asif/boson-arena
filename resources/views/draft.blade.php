@extends('layouts.app')

@section('title')
    Draft
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">
@endsection


@section('content')
    <div class="container bg-super-light drafts shadow-3-strong pt-3">
{{--        <hr>--}}
        <h1 class="text-center mb-5">My Draft</h1>
        <div class="container drafts-header">
            <div class="new">
                <a href="{{route('create.draft')}}" class="btn btn-info create-draft">New Draft</a>
            </div>
            <div class="search">
                <form action="{{route('search.problem')}}" method="GET">
{{--                    @csrf--}}
                    <div class="input-group bg-super-light search-draft">
                        <div class="form-outline search-draft-input">
                            <input type="search" name="search" id="search_string" class="form-control" />
                            <label class="form-label" for="search">Search</label>
                        </div>
                        <button type="submit" class="btn btn-info search-draft-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
{{--        {{$problems}}--}}
        <div class="container all-drafts pb-3 ">
            @if($searched)
                <a href="{{route('draft')}}" class="btn btn-danger btn-rounded btn-sm mb-2">show All Drafts</a>
            @endif
            @if(count($problems) == 0)
                <div class="no-drafts">
                    <h2 class="text-muted my-5">No Draft Found</h2>
                </div>

            @else
                <ul class="list-group">
                    @foreach($problems as $problem)

                            <li class="list-group-item draft-problem py-4">
                                <div class="row">
                                    <div class="problem-header-name col-md-8 col-sm-7 col-7">
                                        <a class="draft-list-link"
                                           href="{{route('preview.problem', ['id'=>$problem->id])}}">
                                            <div class="problem-name">{!! $problem->name !!}</div>
                                        </a>
                                    </div>
                                    <div class="problem-details col-md-4 col-sm-5 col-5">
                                        <div class="input-group copy-identifier">
                                            <div class="form-outline">
                                                <input value="{{$problem->identifier}}" class="form-control show-unique-identifier" id="unique_identifier{{$problem->id}}" />
                                            </div>
                                            <button
                                                onclick="
                                                    const elem = document.createElement('textarea');
                                                    elem.value = '{{$problem->identifier}}';
                                                    document.body.appendChild(elem);
                                                    elem.select();
                                                    document.execCommand('copy');
                                                    document.body.removeChild(elem);

                                                    this.classList.add('copied');
                                                    this.innerText = 'copied';

                                                    setTimeout(()=>{
                                                    this.innerText = 'copy';
                                                    this.classList.remove('copied');
                                                    }, 5000);

                                                    "

                                                class="btn btn-info btn-copy-identifier">
                                                Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                    @endforeach
                </ul>
            @endif
                <div class="my-3">

                        {{$problems->links()}}

                </div>
        </div>


    </div>
    @include('includes.toast-testing')
@endsection



@section('custom-js')

@endsection
