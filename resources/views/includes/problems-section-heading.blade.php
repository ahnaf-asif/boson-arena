<div class="heading">

    <h1 class="font-weight-bolder">Problems
        @if(isset($_GET['page']))
            (page {{$_GET['page']}})
        @endif
    </h1>
</div>
<div class="search">
    <form action="{{route('search.problem.problems')}}" method="GET">
        {{--                    @csrf--}}
        <div class="input-group">
            <div class="form-outline">
                <input type="search" name="search" id="search_string" class="form-control" />
                <label class="form-label" for="search_string">Search</label>
            </div>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>
