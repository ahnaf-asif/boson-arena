<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Author
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
                if($role == 'author' or $role == 'admin')return $next($request);
            }
        }
        return redirect('home')->with('error','You do not have author access');
    }
}
