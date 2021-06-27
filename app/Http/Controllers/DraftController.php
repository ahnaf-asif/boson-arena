<?php

namespace App\Http\Controllers;

use App\Models\NormalProblem;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DraftController extends Controller
{
    public function index(){

        $problems = Auth::user()->normalProblems;
        $data = ['problems'=>$problems];
        return view('draft', $data);
    }
    public function showCreateForm(){
        $subjects = Subject::all();
        $data = ['subjects'=>$subjects];
        return view('new-draft', $data);
    }
    public function create(Request $req)
    {
        $new_problem = new NormalProblem;

        $new_problem -> subject_id          = $req -> subject;
        $new_problem -> name                = $req -> problem_name;
        $new_problem -> description_en      = $req -> description_en;
        $new_problem -> description_bn      = $req -> description_bn;
        $new_problem -> judging_method      = $req -> evaluation_method;
        $new_problem -> user_id             = Auth::user()->id;

        $new_problem->save();

        $identifier = Hash::make($new_problem->id);

        $new_problem->identifier = $identifier;

        $new_problem->save();

        return redirect()->route('preview.problem',['id'=>$new_problem->id]);

    }
    public function preview($id){

        $current_problem = NormalProblem::find($id);

        $data = ['current_problem'=>$current_problem];
        return view('preview_problem',$data);
    }
}
