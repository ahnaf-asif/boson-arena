<?php

namespace App\Http\Controllers;

use App\Models\NormalProblem;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DraftController extends Controller
{

    public function index(){

        $problems = Auth::user()->normalProblems()->paginate(8);

        $data = [
            'problems'=>$problems,
            'searched'=>false
        ];
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

        return redirect()->route('preview.problem',['id'=>$new_problem->id])
            ->with('success','Successfully created a problem');

    }
    public function edit(Request $req){
        $current_problem = NormalProblem::find($req->id);
        $subjects = Subject::all();
        $data = [
            'current_problem' => $current_problem,
            'subjects'=> $subjects
        ];
        return view('edit-problem', $data);
    }
    public function edit_backend(Request  $req){
        $current_problem = NormalProblem::find($req->id);
        $current_problem -> subject_id          = $req -> subject;
        $current_problem -> name                = $req -> problem_name;
        $current_problem -> description_en      = $req -> description_en;
        $current_problem -> description_bn      = $req -> description_bn;
        $current_problem -> judging_method      = $req -> evaluation_method;
        $current_problem -> user_id             = Auth::user()->id;

        $current_problem->save();
        return redirect()->route('preview.problem', ['id'=> $current_problem->id])->with('success','Successfully updated the problem');
    }

    public function delete($id){
        $current_problem = NormalProblem::find($id);
        $current_problem->delete();
        return redirect()->route('draft')->with('success', 'Successfully deleted the problem');
    }

    public function preview($id){

        $current_problem = NormalProblem::find($id);

        $data = ['current_problem'=>$current_problem];
        return view('preview_problem',$data);
    }

    public function search(Request $req){
        $all_problems = Auth::user()->normalProblems()->where('name','like','%'.$req->search.'%')->paginate(8);
        $data = [
            'problems'=>$all_problems,
            'searched'=>true
        ];
        return view('draft', $data);
    }
    public function addRemoveArchive($problem, $type){
        $current_problem = NormalProblem::find($problem);
        $message = '';
        if($type == 0){
            $current_problem->archive=false;
            $message = 'Successfully removed the problem from archive';
        }else{
            $current_problem->archive=true;
            $message = 'Successfully added the problem in the archive';
        }
        $current_problem->save();
        return redirect()->route('preview.problem', ['id'=> $current_problem->id])->with('success',$message);
    }
    public function updateScore(Request $req){
        $current_problem = NormalProblem::find($req->problem_id);
        $current_problem->score = $req->score;
        $current_problem->save();
        $message = "Successfully updated the score";

        return redirect()->route('preview.problem', ['id'=> $current_problem->id])->with('success',$message);
    }
}
