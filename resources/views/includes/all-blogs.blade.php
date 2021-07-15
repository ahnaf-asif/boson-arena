<div class="all-blogs">
{{--    <ul class="list-group">--}}

{{--        @if(count($all_blogs) == 0)--}}
{{--            <h1 class="text-muted">No Blogs Found</h1>--}}
{{--        @endif--}}

{{--        @foreach($all_blogs as $blog)--}}
{{--            <li class="list-group-item blog-list-item my-2">--}}
{{--                <h2 class="font-weight-bold" >{!! $blog->title !!}</h2>--}}
{{--                <p class="text-muted mb-5"><small style="font-size: 13px;">{{$blog->user->name}}, {{$blog->created_at->format('Y:m:d h:i a')}}, <span class="font-weight-bold">{{$blog->subject->name}}</span></small></p>--}}
{{--                <hr>--}}
{{--                <div class="mb-5 blog-texts">--}}
{{--                    {!! $blog->short_description !!}--}}
{{--                </div>--}}
{{--                <p><a class="btn btn-primary" href="{{route('view.blog', ['id' => $blog->id])}}">SEE MORE</a></p>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}

    <div class="row" style="row-gap: 1.5rem;">
        @if(count($all_blogs) == 0)
            <h1 class="text-muted">No Blogs Found</h1>
        @else
            @foreach($all_blogs as $blog)
                <div class="col-lg-6">
                    <div class="card blog-card shadow-0">



                        <div class="bg-image hover-zoom">
                            <img
                                src="{{$blog->og_image}}"
                                class="card-img-top"
                                alt="title image"
                            />
                        </div>
                        <div class="card-body position-relative">
                            <span class="badge translate-middle bg-success blog-badge">{{$blog->subject->name}}</span>

                            <div class="card-title">
                                <h3 class="font-weight-bold">{!! $blog->title !!}</h3>
                                <p><small>{{$blog->user->name}} - {{$blog->created_at->format('Y:m:d h:i a')}}</small></p>
                            </div>
                            <p class="card-text">
                                {!! $blog->short_description !!}
                            </p>
                            <a href="{{route('view.blog', ['id'=>$blog->id])}}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


    {{$all_blogs->links()}}
</div>

<script>
    // document.querySelectorAll('.preview-card-image').addEventListener('mouseover',()=>{
    //     // if(!document.querySelector('.preview-card-image').classList.contains('preview-card-image-reverse-animation')){
    //         document.querySelectorAll('.preview-card-image').classList.add('preview-card-image-reverse-animation');
    //     // }
    // });
</script>
