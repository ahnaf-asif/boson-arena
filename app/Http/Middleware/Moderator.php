<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Moderator
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
        if(Auth::user()){
            foreach(Auth::user()->roles as $role){
                if($role->name == 'moderator' or $role->name=='admin')return $next($request);
            }
        }
        return redirect()->route('home')->with('error','You do not have moderator access');
    }
}
