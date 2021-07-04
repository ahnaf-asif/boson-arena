<style>
    .pagination-for-pc{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

@if ($paginator->hasPages())

    <div class="pagination-for-pc">




        @if ($paginator->onFirstPage())
            <btn class="btn hover-success shadow-1" href="#"><i class="fas fa-arrow-left"></i> Prev</btn>
        @else
            <a class="btn btn-primary  hover-success shadow-1" href="{{$paginator->previousPageUrl()}}"><i class="fas fa-arrow-left"></i> Prev</a>
        @endif


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <a class="btn btn-primary  hover-success shadow-1"href="{{$paginator->nextPageUrl()}}">Next <i class="fas fa-arrow-right"></i></a>
        @else
                <btn class="btn hover-success shadow-1"href="{{$paginator->previousPageUrl()}}">Next <i class="fas fa-arrow-right"></i></btn>
        @endif
    </div>
@endif
