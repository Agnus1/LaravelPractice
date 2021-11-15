<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use \App\Http\Requests\CreateRequest;

class ArticlesPageController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::getLatest();
        return view('pages.articles', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('pages.article', ['article' => $article]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(CreateRequest $request)
    {
        Article::create($request->validated());
        return redirect()->route('articles');
    }
}
