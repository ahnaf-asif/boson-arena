<div class="card">
    <div class="card-header">
        <h3>
            {{ __('Update profile Picture') }}
        </h3>
    </div>

    <div class="card-body">
        <div class="text-left">
            <div id="profilePicturePreview" class="img-preview" style="display: none;margin-bottom: 20px;">
                <img id="profilePicturePreviewImg" src="{{Auth::user()->profile_picture_link}}" alt="img-preview" style="width:300px;" />
            </div>
            <input id="profilePictureInput" type="file">
            <form class="my-2" action="{{route('profile.picture.update')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input id="profilePictureLink" type="hidden" name="picture_link" value="" >
                <input id="profilePicturesubmitBtn" type="submit" class="btn btn-dark" value="Submit" disabled>
            </form>
        </div>
    </div>
</div>
