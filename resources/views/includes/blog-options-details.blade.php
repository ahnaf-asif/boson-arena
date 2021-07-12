
<style>
    .btn-filter{
        width: 200px;
    }
</style>

<div class="blog-detailed-options">

    <div class="py-3 px-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
        <p class="font-weight-bold">Options</p>
        <hr>
        <div class="mt-3">
            <a href="{{route('blog')}}" class="btn btn-black btn-filter">
                All Blogs
            </a>
        </div>

    </div>

    <div class="py-3 px-2 my-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
        <p class="font-weight-bold">Filter Blogs</p>
        <hr>
        <form action="{{route('blog.filter.by.subject')}}" method="GET">
            @foreach($subjects as $sub)
                <div class="form-check pt-3">
                    <input
                        name="filtered_subjects[]"
                        type="checkbox"
                        id="subject{{$sub->id}}"
                        value="{{$sub->id}}"
                        class="form-check-input"
                        @if(isset($already_filtered))
                            @foreach($already_filtered as $ff)
                                @if($ff == $sub->id)
                                    checked
                                @endif
                            @endforeach
                        @endif
                    >
                    <label for="subject{{$sub->id}}" class="form-check-label">{{$sub->name}}</label>
                </div>
            @endforeach
            <div class="mt-3">
                <button class="btn btn-black btn-filter" type="submit">Filter Problems</button>
            </div>
        </form>

    </div>
</div>
