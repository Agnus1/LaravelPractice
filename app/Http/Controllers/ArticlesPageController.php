<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\TagsRepositoryContract;
use \App\Http\Requests\CreateRequest;
use \App\Http\Requests\TagValidationRequest;
use \App\Http\Requests\ImageValidationRequest;
use App\Services\TagsSynchronizerContract;
use App\Services\ImagesSynchronizerContract;

class ArticlesPageController extends Controller
{
    private $articlesRepository;
    private $tagsSynchronizer;
    private $imagesSynchronizer;
    
    public function __construct(ArticlesRepositoryContract $repository,
                                TagsSynchronizerContract $tagsSynchronizer,
                                ImagesSynchronizerContract $imagesSynchronizer,
    )
    {
        $this->middleware('auth');
        
        $this->articlesRepository = $repository;
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->imagesSynchronizer = $imagesSynchronizer;
    }

    public function index()
    {
        $page = request()->page ?? 1;
        $articles = $this->articlesRepository->paginate(5, $page);
        return view('pages.articles.index', ['articles' => $articles]);
    }

    public function show(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('pages.articles.create');
    }

    public function store(CreateRequest $request,
                          TagValidationRequest $tagRequest,
                          ImageValidationRequest $imageRequest
    )
    {
        $attributes = $request->validated();
        $tags = $tagRequest->safe()->collect();
        $imageAttributes = $imageRequest->safe()->collect();

        $article = $this->articlesRepository->make($attributes);

        $this->imagesSynchronizer->sync($imageAttributes, $article);
        $this->articlesRepository->save($article);
        $this->tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.index');
    }

    public function edit(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.articles.edit', ['article' => $article]);
    }

    public function update(string $slug, 
                           CreateRequest $request,
                           TagValidationRequest $tagRequest,
                           ImageValidationRequest $imageRequest
    )
    {
        $attributes = $request->validated();
        $tags = $tagRequest->safe()->collect();
        $imageAttributes = $imageRequest->safe()->collect();

        $article = $this->articlesRepository->update($slug, $attributes);
        $this->tagsSynchronizer->sync($tags, $article);
        $this->imagesSynchronizer->sync($imageAttributes, $article);
        
        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(string $slug)
    {
        $this->articlesRepository->delete($slug);
        return redirect()->route('articles.index');
    }
}
