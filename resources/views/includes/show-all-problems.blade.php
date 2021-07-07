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
                    </p>
                    <div class="text-right mt-4">
                        <button class="btn btn-rounded btn-sm btn-success"
                                style="width: 180px;text-transform: lowercase;"
                        >
                            {{$problem->subject->name}}, Score: {{$problem->score}}
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
