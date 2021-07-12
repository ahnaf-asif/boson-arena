<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\EducationalLevel;
use App\Models\NormalProblem;
use App\Models\NormalSubmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($username){
        if($username != Auth::user()->username){
            return redirect()->route('home')->with('error', 'you are not allowed to see that');
        }

        $all_submissions = NormalSubmission::select('id')

                                                ->where('user_id', Auth::user()->id)->count();
        $accepted_submissions = NormalSubmission::select('id')

                                            ->where('user_id', Auth::user()->id)
                                            ->where('verdict', 'correct')
                                            ->count();
        $wrong_submissions = $all_submissions-$accepted_submissions;

        $my_problems = NormalProblem::select('id')
                                        ->where('user_id', Auth::user()->id)->count();

        $my_blogs = Blog::select('id')
            ->where('user_id', Auth::user()->id)->count();

        $data = [
            'all_submissions' => $all_submissions,
            'accepted_submissions' => $accepted_submissions,
            'wrong_submissions' => $wrong_submissions,
            'my_problems' => $my_problems,
            'my_blogs' => $my_blogs
        ];

        return view('profile', $data);
    }
    public function showProfileEditForm($username){
        if($username != Auth::user()->username){
            return redirect()->route('home')->with('error', 'you are not allowed to see that');
        }
        $edu =  EducationalLevel::all();
        return view('editProfile',['username'=>$username, 'edu'=>$edu]);
    }
    public function editProfile($username, Request $request){

        if($username != Auth::user()->username){
            return redirect()->route('home')->with('error', 'you are not allowed to see that');
        }

        $currentUser = User::find($request->user_id);


        $currentUser->name                 = $request->name;
        $currentUser->institution          = $request->institution;
        $currentUser->address              = $request->address;
        $currentUser->phone                = $request->phone;
        $currentUser->social_media_link    = $request->social_media_link;
        $currentUser->educational_level_id = $request->educational_level_id;

        $currentUser->save();

        return redirect()->route('profile', ['username'=> $username])->with('success', 'Successfully updated your profile');

    }
    public function updateProfilePicture(Request $request){
        $current_user = User::find($request->user_id);

        $current_user->profile_picture_link = $request->picture_link;

        $current_user->save();

        return redirect()->route('profile',['username'=> $current_user->username])->with('success', 'Successfully updated your profile picture');
    }
}
