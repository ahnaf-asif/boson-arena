<div class="draft-solutions py-2 my-3">

    <form action="{{route('add.solution')}}" method="POST">
        @csrf
        <input name="problem_id" type="hidden" value="{{$current_problem->id}}" >
        <div class="form-outline">
            <input type="text" id="answer" name="answer" class="form-control" required />
            <label class="form-label" for="answer">Solution</label>
        </div>
        <div class="form-outline mt-2">
            <input type="text" id="precision" name="precision" class="form-control" />
            <label class="form-label" for="precision">Precision </label>
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-black" value="Add Solution">
        </div>
    </form>
    <h5 class="mt-4 text-center font-weight-bolder">Solutions</h5>

    <table class="table table-responsive" style="width:100%;">
            <thead style="width: 100%;">
            <tr>
                <th style="font-weight: bolder;" scope="col">Solution</th>
                <th style="font-weight: bolder;" scope="col">Precision</th>
                <th style="font-weight: bolder;" scope="col">Action</th>
            </tr>
            </thead>
            <tbody style="width: 100%;">
            @if(count($current_problem->solutions) > 0)
                @foreach($current_problem->solutions as $solution)
                    <tr>
                        <td>{!! $solution->answer !!}</td>
                        <td>{!! $solution->margin !!}</td>
                        <td>
                            {{--                            <a href="#" class="btn btn-sm btn-danger">Delete</a>--}}
                            <form action="{{route('delete.solution')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$solution->id}}" name="solution_id">
                                <input type="hidden" value="{{$current_problem->id}}" name="problem_id">
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="3">No Solution Found</td>
                </tr>
            @endif

            </tbody>
        </table>


</div>
