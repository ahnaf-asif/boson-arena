<?php

namespace App\Http\Middleware;

use App\Models\NormalProblem;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyMyProblem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if($request->id == 6){
//            return $next($request);
//        }else{
//            return redirect()->route('home')->with('error','You cannot visit the page');
//        }
        foreach(Auth::user()->roles as $role){
            if($role->name == 'admin' or $role->name == 'moderator'){
                return $next($request);
            }
        }
        $requested_problem = NormalProblem::find($request->id);
        if($requested_problem->user->id == Auth::user()->id){
            return $next($request);
        }else{
            return redirect()->route('draft')->with('error','You cannot visit the page');
        }

    }
}
