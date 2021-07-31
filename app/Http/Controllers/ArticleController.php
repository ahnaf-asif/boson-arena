<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $all_articles = Article::orderBy('id', 'desc')->where('archive', true)->paginate(16)->withQueryString();
        $data = [
            'all_articles' => $all_articles
        ];
        return view('article', $data);
    }


    public function show($id)
    {
        $article = Article::where('archive', true)->find($id);
        $last_ten = Article::select('id','created_at','title', 'og_image', 'author_name')
                            ->orderBy('id', 'desc')
                            ->where('archive', true)
                            ->where('id', '!=', $id)
                            ->take(15)->get();
        $data = [
            'article' => $article,
            'last_ten' => $last_ten
        ];
        return view('show-article', $data);
    }

}
