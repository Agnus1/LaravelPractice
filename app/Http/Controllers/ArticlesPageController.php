<?php

namespace App\Http\Controllers;

use \App\Models\Article;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\TagsRepositoryContract;
use \App\Services\TagsSynchronizer;
use \App\Http\Requests\CreateRequest;
use \App\Http\Requests\TagValidationRequest;
use App\Services\TagsSynchronizerContract;


class ArticlesPageController extends Controller
{
    private $articlesRepository;
    private $tagsRepository;
    private $tagsSynchronizer;

    public function __construct(ArticlesRepositoryContract $repository,
                                TagsRepositoryContract $tagRepository,
                                TagsSynchronizerContract $tagsSynchronizer
    )
    {
        $this->articlesRepository = $repository;
        $this->tagsRepository = $tagRepository;
        $this->tagsSynchronizer = $tagsSynchronizer;
    }

    public function index()
    {
        $articles = $this->articlesRepository->paginate(5);
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

    public function store(CreateRequest $request,
                          TagValidationRequest $tagRequest,
    )
    {
        $article = $this->articlesRepository->create($request->validated());
        $tags = $tagRequest->safe()->collect();
        $this->tagsSynchronizer->sync($tags, $article, $this->tagsRepository);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('pages.articles.edit', ['article' => $article]);
    }

    public function update(Article $article,
                           CreateRequest $request,
                           TagValidationRequest $tagRequest
    )
    {
        $article->update($request->validated());
        $tags = $tagRequest->safe()->collect();
        $this->tagsSynchronizer->sync($tags, $article, $this->tagsRepository);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
