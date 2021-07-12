<?php

namespace App\Http\Controllers;

use App\Models\NormalProblem;
use App\Models\NormalSubmission;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProblemController extends Controller
{
    public function index(){
        $all_problems = NormalProblem::where('archive', true)
                                        ->orderBy('id', 'DESC')
                                        ->paginate(10)->withQueryString();
        $ranklist_users = User::select(['name','score'])->orderBy('score','DESC')->take(10)->get();

        $subjects = Subject::all();
        $solved = [];
        foreach($all_problems as $problem){
            $accepted_submissions = NormalSubmission::all()
                ->where('normal_problem_id',$problem->id)
                ->where('verdict','correct')
                ->where('user_id',Auth::user()->id);
            array_push($solved, count(is_countable($accepted_submissions)?$accepted_submissions:[]));
        }
        $data = [
            'all_problems' => $all_problems,
            'subjects' => $subjects,
            'solved' => $solved,
            'already_filtered' => [],
            'searched' => false,
            'ranklist_users' => $ranklist_users
        ];
        return view('problems', $data);
    }
    public function show($id){
        $current_problem = NormalProblem::where('archive', true)->find($id);

        $normal_submissions = NormalSubmission::all()->where('normal_problem_id', $id);
        $number_of_submissions = count(is_countable($normal_submissions)?$normal_submissions:[]);

        $accepted_submissions = NormalSubmission::all()->where('normal_problem_id',$id)->where('verdict','correct');
        $number_of_correct_submissions = count(is_countable($accepted_submissions)?$accepted_submissions:[]);

        $user_submissions = NormalSubmission::all()->where('verdict', 'correct')->where('normal_problem_id',$id)->where('user_id',Auth::user()->id);
        $user_status = count(is_countable($user_submissions)?$user_submissions:[]);

        $data = [
            'current_problem' => $current_problem,
            'number_of_submissions' => $number_of_submissions,
            'number_of_correct_submissions' => $number_of_correct_submissions,
            'user_status' => $user_status,
//            'my_last_5_submissions' => $my_last_5_submissions
        ];

        return view('view_problem', $data);
    }
    public function submit(Request $req){
        $current_problem = NormalProblem::find($req->problem_id);

        $current_submission = new NormalSubmission;
        $current_submission->solution = $req->submission;
        $current_submission->normal_problem_id = $req->problem_id;
        $current_submission->user_id = Auth::user()->id;

        foreach($current_problem->solutions as $solution){
            if($solution->answer == $req->submission){

                $current_submission->verdict = 'correct';
                $current_submission->save();

                $accepted_submissions = count(NormalSubmission::all()
                    ->where('normal_problem_id',$current_problem->id)
                    ->where('verdict','correct')
                    ->where('user_id',Auth::user()->id));

                if($accepted_submissions == 1){
                    $current_user = User::find(Auth::user()->id);
                    $current_user->score += $current_problem->score;
                    $current_user->save();
                }

                return redirect()->route('show.problem',['id'=>$req->problem_id])
                    ->with('success', 'Your solution is correct');
            }
            if(is_numeric($solution->answer) and is_numeric($req->submission) and is_numeric($solution->margin)){
                $one = (double)$solution->answer;
                $two = (double)$req->submission;
                if(abs($two-$one) <= (double)$solution->margin ){

                    $current_submission->verdict = 'correct';
                    $current_submission->save();

                    $accepted_submissions = count(NormalSubmission::all()
                        ->where('normal_problem_id',$current_problem->id)
                        ->where('verdict','correct')
                        ->where('user_id',Auth::user()->id));

                    if($accepted_submissions == 1){
                        $current_user = User::find(Auth::user()->id);
                        $current_user->score += $current_problem->score;
                        $current_user->save();
                    }

                    return redirect()->route('show.problem',['id'=>$req->problem_id])
                        ->with('success', 'Your solution is correct');
                }
            }
        }
        $current_submission->verdict = 'wrong';
        $current_submission->save();
        return redirect()->route('show.problem',['id'=>$req->problem_id])
            ->with('error', 'Your solution is incorrect');
    }
    public function filterBySubject(Request $request){
        $ranklist_users = User::select(['name','score'])->orderBy('score','DESC')->take(10)->get();
        if(isset($request->filtered_subjects) == 0 and isset($request->only_unsolved) == 0){
            return redirect(route('problems'));
        }
        if(isset($request->filtered_subjects) == 0 and isset($request->only_unsolved)){
            return redirect(route('unsolved.problems'));
        }
        if(isset($request->only_unsolved)){
            $all_problems = NormalProblem::whereDoesntHave('normalSubmissions', function($q){
                $q->where('user_id',Auth::user()->id)
                    ->where('verdict','correct');
            })
                ->whereIn('subject_id',$request->filtered_subjects)
                ->where('archive', true)
                ->orderBy('id', 'DESC')
                ->paginate(8)->withQueryString();
        }
        else $all_problems = NormalProblem::whereIn('subject_id',$request->filtered_subjects)
                                        ->where('archive', true)
                                        ->orderBy('id', 'DESC')
                                        ->paginate(10)->withQueryString();

        $subjects = Subject::all();
        $solved = [];
        foreach($all_problems as $problem){
            $accepted_submissions = NormalSubmission::all()
                ->where('normal_problem_id',$problem->id)
                ->where('verdict','correct')
                ->where('user_id',Auth::user()->id);
            array_push($solved, count(is_countable($accepted_submissions)?$accepted_submissions:[]));
        }
        $data = [
            'all_problems' => $all_problems,
            'subjects' => $subjects,
            'solved' => $solved,
            'already_filtered' => $request->filtered_subjects,
            'searched' => false,
            'ranklist_users' => $ranklist_users
        ];

        return view('problems', $data);

    }
    public function search(Request $req){
        $all_problems = NormalProblem::where('archive', 1)->where('name','like','%'.$req->search.'%')->paginate(10)->withQueryString();
        $ranklist_users = User::select(['name','score'])->orderBy('score','DESC')->take(10)->get();

        $subjects = Subject::all();
        $solved = [];
        foreach($all_problems as $problem){
            $accepted_submissions = NormalSubmission::all()
                ->where('normal_problem_id',$problem->id)
                ->where('verdict','correct')
                ->where('user_id',Auth::user()->id);
            array_push($solved, count(is_countable($accepted_submissions)?$accepted_submissions:[]));
        }
        $data = [
            'all_problems' => $all_problems,
            'subjects' => $subjects,
            'solved' => $solved,
            'already_filtered' => [],
            'searched' => true,
            'ranklist_users' => $ranklist_users
        ];
        return view('problems', $data);
    }
    public function showUnsolved(){
        $all_problems = NormalProblem::whereDoesntHave('normalSubmissions', function($q){
            $q->where('user_id',Auth::user()->id)
              ->where('verdict','correct');
        })
        ->where('archive', true)
        ->orderBy('id', 'DESC')
        ->paginate(10)->withQueryString();

        $ranklist_users = User::select(['name','score'])->orderBy('score','DESC')->take(10)->get();
        $subjects = Subject::all();
        $solved = [];
        foreach($all_problems as $problem){
            $accepted_submissions = NormalSubmission::all()
                ->where('normal_problem_id',$problem->id)
                ->where('verdict','correct')
                ->where('user_id',Auth::user()->id);
            array_push($solved, count(is_countable($accepted_submissions)?$accepted_submissions:[]));
        }
        $data = [
            'all_problems' => $all_problems,
            'subjects' => $subjects,
            'solved' => $solved,
            'already_filtered' => [],
            'searched' => false,
            'showUnsolved' => true,
            'ranklist_users' => $ranklist_users
        ];
        return view('problems', $data);
    }
}
