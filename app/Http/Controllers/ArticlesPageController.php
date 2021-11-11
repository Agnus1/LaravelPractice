<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesPageController extends Controller
{
    public function articles()
    {
        $articles = \App\Models\Article::getLatest();

        return view('pages.articles', ['articles' => $articles]);
    }
}
