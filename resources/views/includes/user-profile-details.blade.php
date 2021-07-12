<style>
    .left-profile .table>:not(caption)>*>*{
        padding: 15px 10px;
    }
    .left-profile .table *{
        font-size: 17px;
    }
</style>

<div class="left-profile mb-4 pb-3 shadow-2 py-2">
{{--    <div class="profile-picture">--}}
{{--        @if(Auth::user()->profile_picture_link)--}}
{{--            <img src="{{Auth::user()->profile_picture_link}}" style="width: 98%;height: auto;">--}}
{{--        @else--}}
{{--            <img src="{{asset('images/blank-profile-picture.png')}}" style="width: 98%;height: auto;">--}}
{{--        @endif--}}
{{--    </div>--}}
    <h2 class="text-center my-2 font-weight-bold ">{{Auth::user()->name}}</h2>
{{--    mama--}}
    <p class="text-center">
        <a
            target="_blank"
            href="{{Auth::user()->social_media_link}}"
            style="text-decoration: none;"
        >My Social Media</a>
    </p>
    <table class="table table-borderless table-responsive">
        <tbody>
            <tr>
                <td class="font-weight-bold">Name</td>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">User Name</td>
                <td>{{Auth::user()->username}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Email</td>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Phone</td>
                <td>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Institution</td>
                <td>{{Auth::user()->institution}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Address</td>
                <td>{{Auth::user()->address}}</td>
            </tr>
{{--            <tr>--}}
{{--                <td colspan="2"><a href="{{Auth::user()->social_media_link}}">My Social Media</a></td>--}}
{{--            </tr>--}}
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{route('profile.edit', ['username'=>Auth::user()->username])}}" class="btn btn-black">Edit Profile</a>
    </div>
</div>
