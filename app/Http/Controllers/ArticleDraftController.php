<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleDraftController extends Controller
{

    private function validator(array $data){
        return Validator::make($data, [
            'article_title' => ['required'],
            'short_description' => ['required', 'string', 'max:500'],
            'article' => ['required']
        ]);
    }

    public function index()
    {
        $all_articles = Article::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->paginate(10)->withQueryString();
        $data = [
            'all_articles' => $all_articles
        ];
        return view('article-draft', $data);
    }


    public function create()
    {
        return view('article-draft-create');
    }


    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $new_article = new Article;
        $new_article->user_id = Auth::user()->id;
        $new_article->title = $request->article_title;
        $new_article->og_image = $request->og_image;
        $new_article->short_description = $request->short_description;
        $new_article->article = $request->article;
        $new_article->author_name = $request->author_name;
        $new_article->save();

        return redirect()->route('article.draft')->with('success', 'Successfully Created an Article');
    }


    public function show($id)
    {
        $current_article = Article::find($id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $data = [
            'current_article' => $current_article
        ];
        return view('article-draft-show', $data);
    }


    public function edit($id)
    {
        $current_article = Article::find($id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $data = [
            'current_article' => $current_article
        ];
        return view('article-draft-edit',$data);
    }


    public function update(Request $request, $id)
    {
        // return $request;
        $current_article = Article::find($id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $current_article->title = $request->article_title;
        $current_article->short_description = $request->short_description;
        $current_article->article = $request->article;
        $current_article->author_name = $request->author_name;
        $current_article->save();

        return redirect()->route('show.article', ['id' => $id])->with('success', 'successfully updated the article');
    }


    public function destroy($id)
    {
        $current_article = Article::find($id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $current_article->delete();

        return redirect()->route('article.draft')->with('success', 'successfully Deleted the article');

    }
    public function addRemoveArchive($id, $type){
        $current_article = Article::find($id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $current_article->archive = $type;
        $current_article->save();
        $msg = 'Successfully added to the archive';
        if($type == 0){
            $msg = 'Successfully removed from the archive';
        }
        return redirect()->route('show.article', ['id' => $id])->with('success', $msg);
    }
    public function search(Request $req){
        $all_articles = Auth::user()->articles()->where('title','like','%'.$req->search.'%')->paginate(10)->withQueryString();

        $data = [
            'all_articles' => $all_articles,
            'searched' => true
        ];

        return view('article-draft', $data);
    }
    public function updateOgImage(Request $req){
        $current_article = Article::find($req->id);
        if($current_article->user_id != Auth::user()->id){
            return redirect()->route('article.draft')->with('error', 'You can not visit this page');
        }
        $current_article->og_image = $req->picture_link;
        $current_article->save();

        return redirect()->route('show.article', ['id' => $req->id])->with('success', 'successfully updated the preview image');
    }
}
