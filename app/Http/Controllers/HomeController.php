<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Resource;
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
                            ->take(6)->get();
        $all_articles = Article::orderBy('id','desc')
                            ->where('archive', true)
                            ->take(6)->get();
        $data = [
            'all_blogs' => $all_blogs,
            'all_articles' => $all_articles
        ];
        return view('home', $data);
    }
    public function about(){
        $about = About::find(1);
        $data = [
            'about' => $about
        ];
        return view('about', $data);
    }
    public function resources(){
        $resources = Resource::find(1);
        $data = [
            'resources' => $resources
        ];
        return view('resources', $data);
    }
    public function faq(){
        $faq = Faq::find(1);
        $data = [
            'faq' => $faq
        ];
        return view('faq', $data);
    }
}
