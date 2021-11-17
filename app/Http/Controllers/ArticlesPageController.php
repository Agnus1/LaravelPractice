<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use \App\Http\Requests\CreateRequest;

class ArticlesPageController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::getLatest();
        return view('pages.articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('pages.articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('pages.articles.create');
    }

    public function store(CreateRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        Article::create($request->validated());
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('pages.articles.edit', ['article' => $article]);
    }

    public function update(Article $article, CreateRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        //$tagsSynchronizer->sync(,$article);
        $article->update($request->validated());
        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
