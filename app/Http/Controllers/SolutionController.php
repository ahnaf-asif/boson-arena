<?php

namespace App\Http\Controllers;

use App\Models\NormalProblem;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function add(Request $req){

        $new_solution = new Solution;
        $new_solution->answer = $req->answer;
        if($req->precision != null)$new_solution->margin = $req->precision;
        else $new_solution->margin = '0';
        $new_solution->normal_problem_id = $req->problem_id;

        $new_solution->save();

        return redirect()->route('preview.problem', ['id'=>$req->problem_id])
            ->with('success', 'Solution added successfully');
    }
    public function delete(Request $req){
        $current_solution = Solution::find($req->solution_id);
        $current_solution->delete();

        return redirect()->route('preview.problem', ['id'=>$req->problem_id])
            ->with('success', 'Solution deleted successfully');
    }
    public function test_submit(Request $req){
        $current_problem = NormalProblem::find($req->problem_id);
        foreach($current_problem->solutions as $solution){
            if($solution->answer == $req->submission){
                return redirect()->route('preview.problem',['id'=>$req->problem_id])
                    ->with('success', 'Your solution is correct');
            }
            if(is_numeric($solution->answer) and is_numeric($req->submission) and is_numeric($solution->margin)){
                $one = (double)$solution->answer;
                $two = (double)$req->submission;
                if(abs($two-$one) <= (double)$solution->margin ){
                    return redirect()->route('preview.problem',['id'=>$req->problem_id])
                        ->with('success', 'Your solution is correct');
                }
            }
        }
        return redirect()->route('preview.problem',['id'=>$req->problem_id])
            ->with('error', 'Your solution is incorrect');
    }
}
