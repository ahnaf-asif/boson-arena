<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subject;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $all_blogs = Blog::select('author_name','id','title','user_id','subject_id','created_at','short_description', 'og_image')
                    ->orderBy('id', 'desc')
                    ->where('archive', 1)
                    ->paginate(8);
        $subjects = Subject::all();
        $data = [
            'all_blogs' => $all_blogs,
            'subjects' => $subjects
        ];

        return view('blog', $data);
    }
    public function view($id){
        $current_blog = Blog::find($id);
        if(!$current_blog->archive){
            return redirect()->back()->with('error', 'This blog is currently unavailable');
        }
        $related_blogs = Blog::select('author_name','id', 'title', 'og_image', 'created_at')
                                ->where('archive', 1)
                                ->where('subject_id', $current_blog->subject_id)
                                ->where('id', '!=', $id)->get();
        $data = [
            'current_blog' => $current_blog,
            'related_blogs' => $related_blogs
        ];
        return view('view-blog', $data);
    }
    public function search(Request $req){

        $all_blogs = Blog::select('author_name','id','og_image','title','user_id','subject_id','created_at','short_description')
            ->orderBy('id', 'desc')
            ->where('title','like','%'.$req->search.'%')
            ->where('archive', 1)
            ->paginate(8);
        $subjects = Subject::all();
        $data = [
            'all_blogs' => $all_blogs,
            'subjects' => $subjects,
            'search' => $req->search,
            'searched' => true
        ];

        return view('blog', $data);
    }
    public function filterBySubject(Request $req){

        if(!isset($req->filtered_subjects))return redirect()->route('blog');

        $all_blogs = Blog::select('author_name','id','og_image','title','user_id','subject_id','created_at','short_description')
                        ->whereIn('subject_id', $req->filtered_subjects)
                        ->orderBy('id','desc')
                        ->paginate(8)
                        ->withQueryString();
        $subjects = Subject::all();

        $data = [
            'all_blogs' => $all_blogs,
            'subjects' => $subjects,
            'already_filtered' => $req->filtered_subjects
        ];

        return view('blog',$data);
    }
}
