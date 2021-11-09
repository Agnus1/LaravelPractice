<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesPageController extends Controller
{
    public function articles()
    {
        $articles = \App\Models\Article::query()
            ->select(['title', 'description', 'published_at'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get()->toArray();

        return view('pages.articles', ['articles' => $articles]);
    }
}
