<!-- Modal -->
<div
    class="modal fade"
    id="deleteProblem"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you really want to delete the problem? </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                If you delete the problem, all records of the problem will be lost forever.
            </div>
            <div class="modal-footer">
{{--                <button type="button" class="btn btn-success" data-mdb-dismiss="modal">--}}
{{--                    Cancel--}}
{{--                </button>--}}
                <a href="{{route('delete.problem', ['id'=>$current_problem->id])}}"class="btn btn-danger">Yes , Delete</a>
            </div>
        </div>
    </div>
</div>
