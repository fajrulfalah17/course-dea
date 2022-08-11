<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(7);

        return view('home', [
            'title'     => 'Artikle Hari Ini',
            'articles'  => $articles
        ]);
    }

    public function article_detail($id)
    {
        $article = Article::find($id);

        return view('article', [
            'title' => 'ini artikel ' .$id,
            'article'   => $article
        ]);
    }
}
