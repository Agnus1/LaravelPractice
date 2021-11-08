<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesPageController extends Controller
{
    public function articles()
    {
        $articles = \App\Models\Article::query()
            ->select(['title', 'description', 'published_at', 'slug'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('pages.articles', ['articles' => $articles]);
    }

    public function articlesItemDetail(Article $article)
    {
        return view('pages.article', ['article' => $article]);
    }
}
