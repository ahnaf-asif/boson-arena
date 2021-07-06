<div class="py-3 px-2 mt-3" style="border: 1px solid rgba(0,0,0,.125);background: white;">

    <p class="font-weight-bold">Top Problem Solvers</p>
{{--    <hr>--}}
    <table class="table">
        <thead>
            <tr>
                <th class="font-weight-bold">Name</th>
                <th class="font-weight-bold">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranklist_users as $ru)
                <tr>
                    <td>{{$ru->name}}</td>
                    <td>{{$ru->score}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
