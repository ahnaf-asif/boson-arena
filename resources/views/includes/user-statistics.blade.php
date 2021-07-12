<style>
    .profile-heading-stats{
        font-size: 1.5rem;
    }
</style>

<div class="">
    <div class="hello py-3 px-3 " style="background: #1f6fb2" >
        <h2 class="font-weight-bold text-light">My Statistics</h2>
    </div>
    <div class="py-3 px-2 mb-2" style="border: 1px solid rgba(0,0,0,.125);background: white;">
        <table class="table table-borderless table-responsive">
            <tbody>
                <tr>
                    <td class="profile-heading-stats">Score</td>
                    <td class="profile-heading-stats text-success font-weight-bold">{{Auth::user()->score}}</td>
                </tr>
                <tr>
                    <td class="profile-heading-stats">Total Submissions</td>
                    <td class="profile-heading-stats text-success font-weight-bold">{{$all_submissions}}</td>
                </tr>
                <tr>
                    <td class="profile-heading-stats">Accepted Submissions</td>
                    <td class="profile-heading-stats text-success font-weight-bold">{{$accepted_submissions}}</td>
                </tr>
                <tr>
                    <td class="profile-heading-stats">Wrong Submissions</td>
                    <td class="profile-heading-stats text-danger font-weight-bold">{{$wrong_submissions}}</td>
                </tr>
                <tr>
                    <td class="profile-heading-stats">My Problems</td>
                    <td class="profile-heading-stats text-success font-weight-bold">{{$my_problems}}</td>
                </tr>
                <tr>
                    <td class="profile-heading-stats">My Blogs</td>
                    <td class="profile-heading-stats text-success font-weight-bold">{{$my_blogs}}</td>
                </tr>
            </tbody>
        </table>
    </div>
{{--    <ul class="list-group">--}}

{{--        <li class="list-group-item py-3">--}}
{{--            <span class="" style="font-size: 20px;">Score : <span class="font-weight-bold text-success">1000</span></span>--}}
{{--        </li>--}}

{{--        <li class="list-group-item py-3">--}}
{{--            <span class="" style="font-size: 20px;">Total Submissions : <span class="font-weight-bold text-success">1000</span></span>--}}
{{--        </li>--}}

{{--        <li class="list-group-item py-3">--}}
{{--            <span class="" style="font-size: 20px;">Accepted Submissions : <span class="font-weight-bold text-success">123</span></span>--}}
{{--        </li>--}}

{{--    </ul>--}}
</div>
