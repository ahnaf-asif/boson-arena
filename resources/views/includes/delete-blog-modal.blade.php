<!-- Modal -->
<div
    class="modal fade"
    id="deleteBlog"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you really want to delete the Blog? </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                If you delete the blog, all records of the blog will be lost forever.
            </div>
            <div class="modal-footer">

                <a href="{{route('delete.blog', ['id'=>$current_blog->id])}}"class="btn btn-danger">Yes , Delete</a>
            </div>
        </div>
    </div>
</div>
<?php
