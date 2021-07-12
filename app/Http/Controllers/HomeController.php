<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_blogs = Blog::orderBy('id','desc')
                            ->where('archive', true)
                            ->take(4)->get();
        $data = [
            'all_blogs' => $all_blogs
        ];
        return view('home', $data);
    }
}
