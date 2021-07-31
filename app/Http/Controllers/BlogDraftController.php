<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogDraftController extends Controller
{
    private function validator(array $data){
        return Validator::make($data, [
            'blog_title' => ['required'],
            'short_description' => ['required', 'string', 'max:500'],
            'blog' => ['required']
        ]);
    }

    public function index(){

        $all_blogs = Blog::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->paginate(10)->withQueryString();
        $data = [
            'all_blogs' => $all_blogs
        ];

        return view('blog-draft', $data);
    }

    public function showCreateForm(){
        $subjects = Subject::all();
        $data = [
            'subjects'=> $subjects
        ];
        return view('create-blog', $data);
    }
    public function createBlog(Request $req){

        $this->validator($req->all())->validate();
        $current_blog = new Blog;
        $current_blog->title = $req->blog_title;
        $current_blog->user_id = Auth::user()->id;
        $current_blog->subject_id = $req->subject;
        $current_blog->short_description = $req->short_description;
        $current_blog->blog=$req->blog;
        $current_blog->og_image = $req->og_image;
        $current_blog->author_name = $req->author_name;

        $current_blog->save();

        return redirect()->route('preview.blog', ['id'=>$current_blog->id])->with('success','Successfully Created a Blog');
    }

    public function preview($id){
        $current_blog = Blog::find($id);
        if($current_blog->user_id != Auth::user()->id){
            return redirect()->route('blog.draft')->with('error', 'You can not preview the blog');
        }
        $data = [
            'current_blog' => $current_blog
        ];
        return view('preview-blog', $data);
    }

    public function editForm($id){
//        return 'hello';
        $current_blog = Blog::find($id);
        if($current_blog->user_id != Auth::user()->id){
            return redirect()->route('blog.draft')->with('error', 'You can not edit the blog');
        }
        $subjects = Subject::all();
        $data = [
            'current_blog' => $current_blog,
            'subjects' => $subjects
        ];
        return view('edit-blog', $data);
    }
    public function updateBlog(Request $req){

        $this->validator($req->all())->validate();
        $current_blog = Blog::find($req->blog_id);
        if($current_blog->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'You can not update the blog');
        }
        $current_blog->title = $req->blog_title;
        $current_blog->subject_id = $req->subject;
        $current_blog->short_description = $req->short_description;
        $current_blog->blog=$req->blog;
        $current_blog->author_name=$req->author_name;
        $current_blog->save();

        return redirect()->route('preview.blog', ['id'=>$current_blog->id])->with('success','Successfully updated blog');
    }
    public function deleteBlog($id){
        $current_blog = Blog::find($id);
        if($current_blog->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'You can not delete the blog');
        }
        $current_blog->delete();
        return redirect()->route('blog.draft')->with('success','Successfully Deleted the blog');
    }
    public function addRemoveArchive($id, $type){
        $current_blog = Blog::find($id);
        if($current_blog->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'You can not add the blog to the archive');
        }
        $current_blog->archive = $type;
        $current_blog->save();
        $msg = 'Successfully added the blog in the archive';
        if($type == 0){
            $msg = 'Successfully removed the blog from the archive';
        }
        return redirect()->route('preview.blog', ['id'=>$current_blog->id])->with('success',$msg);
    }
    public function updateOgImage( Request $req){
        $current_blog = Blog::find($req->blog_id);
        if(Auth::user()->id != $current_blog->user_id){
            return redirect()->back()->with('error', 'you cannot update preview image right now');
        }
        $current_blog->og_image = $req->picture_link;
        $current_blog->save();
        $msg = 'successfully changed the preview image';
        return redirect()->route('preview.blog', ['id'=>$current_blog->id])->with('success',$msg);
    }
    public function search(Request $req){

        $all_blogs = Auth::user()->blogs()->where('title','like','%'.$req->search.'%')->paginate(10)->withQueryString();

        $data = [
            'all_blogs' => $all_blogs,
            'searched' => true
        ];

        return view('blog-draft', $data);
    }

}
