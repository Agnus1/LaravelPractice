<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesPageController extends Controller
{
    public function articles()
    {
        $articles = \App\Models\Article::getLatest();

        return view('pages.articles', ['articles' => $articles]);
    }

    public function articlesItemDetail(Article $article)
    {
        return view('pages.article', ['article' => $article]);
    }
}
