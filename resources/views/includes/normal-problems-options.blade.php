<div class="py-3 px-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
    <p class="font-weight-bold">Options</p>
    <hr>
    <div class="mt-3">
        <a href="{{route('problems')}}" class="btn btn-black btn-filter">
            All Problems
        </a>
    </div>
    <div class="mt-3">
        <a href="{{route('unsolved.problems')}}" class="btn btn-black btn-filter">
            Only Unsolved
        </a>
    </div>
</div>
<div class="py-3 px-2 mt-3" style="border: 1px solid rgba(0,0,0,.125);background: white;">
    <p class="font-weight-bold">Filter Problems</p>
    <hr>
    <form action="{{route('filter.by.subject')}}" method="GET">
        <div class="form-check pt-3">
            <input
                name="only_unsolved"
                type="checkbox"
                id="only_unsolved"
                class="form-check-input"
                @if(isset($showUnsolved))
                checked
                @endif
            >
            <label for="check_unsolved" class="form-check-label">Unsolved problems</label>
        </div>
        @foreach($subjects as $sub)
            <div class="form-check pt-3">
                <input
                    name="filtered_subjects[]"
                    type="checkbox"
                    id="subject{{$sub->id}}"
                    value="{{$sub->id}}"
                    class="form-check-input"
                    @foreach($already_filtered as $ff)
                    @if($ff == $sub->id)
                    checked
                    @endif
                    @endforeach
                >
                <label for="subject{{$sub->id}}" class="form-check-label">{{$sub->name}}</label>
            </div>
        @endforeach
        <div class="mt-3">
            <button class="btn btn-primary btn-filter" type="submit">Filter Problems</button>

        </div>
    </form>

</div>
