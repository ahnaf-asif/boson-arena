@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/drafts.css')}}">
@endsection


@section('content')
    <div class="container drafts shadow-2">
{{--        <hr>--}}
        <div class="drafts-header">
            <div class="new">
                <a href="{{route('create.draft')}}" class="btn btn-info create-draft">New Draft</a>
            </div>
            <div class="search">
                <form action="{{route('search.problem')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" name="search_string" id="search_string" class="form-control" />
                            <label class="form-label" for="search_string">Search</label>
                        </div>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
{{--        {{$problems}}--}}
        <div class="all-drafts">
            @if(count($problems) == 0)
                <div class="no-drafts">
                    <h2 class="text-muted my-5">No Draft Found</h2>
                </div>

            @else
                <ul class="list-group">
                    @foreach($problems as $problem)

                            <li class="list-group-item draft-problem py-4">
                                <a class="draft-list-link"
                                   href="{{route('preview.problem', ['id'=>$problem->id])}}">
                                    <div class="problem-name">{!! $problem->name !!}</div>
                                </a>
                                <div class="problem-details">
                                    <div class="input-group">
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

                                            class="btn btn-info btn-copy">
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </li>

                    @endforeach
                </ul>
            @endif
        </div>

    </div>
@endsection



@section('custom-js')

@endsection
