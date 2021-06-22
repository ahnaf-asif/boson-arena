<div class="container-fluid">
    <div class="text-center">
        <img class="user-profile-pic" src="
            @if(Auth::user()->profile_picture_link)
                {{Auth::user()->profile_picture_link}}
            @else
                {{asset('images/blank-profile-picture.png')}}
            @endif
            " alt="user_profile_picture">
        <br>
        <br>
        <h1 class="text-center fw-bold">{{Auth::user()->name}}</h1>
    </div>
    <div class="user-info shadow-2 bg-light">
        @if(Auth::user()->social_media_link)
            <div class="text-center">
                <a href="{{Auth::user()->social_media_link}}" target="_blank">My Social media profile</a>
                <br><br>
            </div>
        @endif
        <div class="container">
            <div class="row single-detail">
                <div class="col-4 text-left">Username</div>
                <div class="col-8 text-left"><b>:</b> {{Auth::user()->username}}</div>
            </div>
            <div class="row single-detail">
                <div class="col-4 text-left">Email</div>
                <div class="col-8 text-left"><b>:</b> {{Auth::user()->email}}</div>
            </div>
{{--            <div class="row single-detail">--}}
{{--                <div class="col-4 text-left">Social</div>--}}
{{--                <div class="col-8 text-left"><b>:</b> {{Auth::user()->email}}</div>--}}
{{--            </div>--}}
            <div class="row single-detail">
                <div class="col-4 text-left">Phone</div>
                <div class="col-8 text-left"><b>:</b> {{Auth::user()->phone}}</div>
            </div>
            <div class="row single-detail">
                <div class="col-4 text-left">Institution</div>
                <div class="col-8 text-left"><b>:</b> {{Auth::user()->institution}}</div>
            </div>
            <div class="row single-detail">
                <div class="col-4 text-left">Class/year</div>
                <div class="col-8 text-left"><b>:</b> {{Auth::user()->educationalLevel->name}}</div>
            </div>
            <div class="row single-detail">
                <div class="col-4 text-left">Joined on</div>
                <div class="col-8 text-left"><b>:</b> {{ Auth::user()->created_at }}</div>
            </div>
        </div>
        <div class="text-center">
            <br>
            <a href="{{route('profile.edit', ['username'=>Auth::user()->username])}}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>


<script>
    // const profilePicture = document.getElementById('profilePicture');
    // const profilePictureUpload = document.getElementById(('profilePictureSubmit'));
    //
    //
    // profilePictureUpload.disabled = true;
    // profilePicture.addEventListener('change',()=>{
    //     profilePictureUpload.disabled = false;
    // });
</script>
