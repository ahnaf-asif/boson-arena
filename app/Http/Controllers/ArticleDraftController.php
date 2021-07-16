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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
