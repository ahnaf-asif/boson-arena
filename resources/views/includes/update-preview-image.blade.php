<div class="blog-options">
    <img id="profilePicturePreviewImg" src="{{$current_blog->og_image}}" alt="preview image"
         style="width: 99%;height:auto;border: 2px solid gray;">
</div>
<div class="blog-options py-3 px-2 my-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
    <h5>Update Preview Image (1024 x 650)</h5>
    <hr>
    <input id="profilePictureInput" type="file">
    <form class="my-2" action="{{route('blog.og.image.update')}}" method="POST">
        @csrf
        <input type="hidden" name="blog_id" value="{{$current_blog->id}}">
        <input id="profilePictureLink" type="hidden" name="picture_link" value="" >
        <input id="profilePicturesubmitBtn" type="submit" class="btn btn-dark" value="Submit" disabled>
    </form>
</div>
