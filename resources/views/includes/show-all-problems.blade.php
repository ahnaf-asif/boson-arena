<div class="">
    <ul class="list-group">

        @if(count($all_problems) == 0)
            <h4 class="text-muted">No Problems available</h4>
        @endif
        <?php $indx = 0; ?>
        @foreach($all_problems as $problem)

            <a class="problems-link my-2" href="{{route('show.problem',['id'=>$problem->id])}}">
                <li class="
                                        list-group-item py-2
                                        @if($solved[$indx])
                    solved
@endif
                    " >
                    <p style="font-size: 20px;">{!! $problem->name !!}
                        <span
                            class="text-danger"
                            style="
                                                font-size:11px;
                                                font-weight: bolder;">
                                                    {{$problem->subject->name}}
                                            </span></p>
                    <div class="text-right mt-3">
                        <button class="btn btn-rounded btn-sm btn-success"
                                style="width: 100px;text-transform: lowercase;"
                        >
                            Score: {{$problem->score}}
                        </button>
                    </div>
                </li>
            </a>
            <?php $indx++; ?>
        @endforeach
    </ul>
</div>
<div class="my-3">
    {{$all_problems->links()}}
</div>
