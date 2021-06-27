<?php

namespace App\Http\Controllers;

use App\Models\EducationalLevel;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username){
        return view('profile', ['username'=>$username]);
    }
    public function showProfileEditForm($username){
        $edu =  EducationalLevel::all();
        return view('editProfile',['username'=>$username, 'edu'=>$edu]);
    }
    public function editProfile($username, Request $request){

        $currentUser = User::find($request->user_id);


        $currentUser->name                 = $request->name;
        $currentUser->institution          = $request->institution;
        $currentUser->address              = $request->address;
        $currentUser->phone                = $request->phone;
        $currentUser->social_media_link    = $request->social_media_link;
        $currentUser->educational_level_id = $request->educational_level_id;

        $currentUser->save();

        return redirect()->route('profile', ['username'=> $username])->with('message', 'Successfully updated your profile');

    }
    public function updateProfilePicture(Request $request){
        $current_user = User::find($request->user_id);

        $current_user->profile_picture_link = $request->picture_link;

        $current_user->save();

        return redirect()->route('profile',['username'=> $current_user->username])->with('message', 'Successfully updated your profile picture');
    }
}
