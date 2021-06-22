<div class="container">

    <div class="text-center text-light heading-stats bg-success px-3 py-2 font-weight-bolder">
        Solved Problems
    </div>
{{--    <hr>--}}
    <div class="solved-problems shadow-2  bg-light">
        <div class="row flex-wrap ">
        @for($i = 0; $i <= 10;$i++)
            <div class="col-4 my-3">
                <a href="#">mama khaise notir pola</a>
            </div>
        @endfor
        </div>
    </div>
    <div class="text-center text-light heading-stats bg-danger px-3 py-2 font-weight-bolder">
        Contest Participation History
    </div>
    <div class="contests-participated shadow-2  bg-light">

{{--        <hr>--}}
        <br>
        @if(rand(1,2) == 1)
            @for($i = 0; $i <= 10;$i++)
                <div class="shadow-2 py-2 px-3 my-3">

                        <a href="#"><h5 class="">Hello world for the first time</h5></a>

                </div>
            @endfor
        @else
            <div class="not-yet text-center text-danger font-weight-bolder">
                <span>No participation yet</span>
            </div>
        @endif

    </div>
</div>
