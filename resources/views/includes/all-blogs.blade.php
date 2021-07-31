

<div class="all-blogs">

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
                        <div class="card-body position-relative" style="padding-left: 0; padding-right: 0;">
                            <span class="badge translate-middle bg-success blog-badge">{{$blog->subject->name}}</span>

                            <div class="card-title">
                                <a href="{{route('view.blog', ['id'=>$blog->id])}}" class="blog-header-link"><h3 class="font-weight-bold">{!! $blog->title !!}</h3></a>
                                <p><small>{{$blog->author_name?$blog->author_name:$blog->user->name}} - {{$blog->created_at->format('d M, Y')}}</small></p>
                            </div>
                            <p class="card-text">
                                {!! $blog->short_description !!}
                            </p>
                            <a href="{{route('view.blog', ['id'=>$blog->id])}}" class="">Read more</a>
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
