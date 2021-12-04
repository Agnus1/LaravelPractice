<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticlesRepository implements ArticlesRepositoryContract
{
    
    private $cacheTags = ['articles', 'images', 'tags'];
    
    public function create(array $attributes) : Article
    {
        return Article::create($attributes);
    }

    public function delete(string $slug)
    {
        $this->findBySlug($slug)->delete();
    }

    public function update(string $slug, array $values) : Article
    {
        $model = $this->findBySlug($slug);
        $model->update($values);
        return $model;
    }
    
    public function save(Article $article)
    {
        $article->save();
    }

    public function make(array $attributes) : Article
    {
        return Article::make($attributes);
    }


    public function paginate(int $count, $page) : LengthAwarePaginator
    {
        $paginate = \Cache::tags($this->cacheTags)->remember(
                    'articles.paginate.' . $page . '-' . $count, 
                    now()->addMinutes(60), 
                    function () use ($count) {
                        return Article::whereNotNull('published_at')
                                        ->latest('published_at')
                                        ->with(['image', 'tags'])
                                        ->paginate($count);
                    });
            
        return $paginate;
    }

    public function getLatest($count) : Collection
    {
        $latest = \Cache::tags($this->cacheTags)->remember(
            'articles.getLatest.' . $count, 
            now()->addMinutes(60), 
            function () use ($count) {
                return Article::whereNotNull('published_at')
                                ->latest('published_at')
                                ->limit($count)
                                ->with(['image', 'tags'])
                                ->get();
            });
         
        return $latest;
    }
    
    public function get() : Collection
    {
        return  Article::get();
    }
    
    public function findBySlug(string $slug) : Article
    {
        $article = \Cache::tags($this->cacheTags)->remember(
            'articles.findBySlug.' . $slug, 
            now()->addMinutes(60), 
            function () use ($slug) {
                return Article::where('slug', $slug)
                                ->with(['image', 'tags'])
                                ->get()
                                ->first();
            });
        return $article;
    }

    public function getCount() : int
    {
        return Article::count();
    }

    public function getOrderByBody(string $direction = 'desc') : Article
    {
        return Article::orderByRaw("LENGTH(`body`) {$direction}")
                        ->first();
    }

    public function getMostTaged() : Article
    {
        return Article::whereHas('tags')
                        ->withCount('tags')
                        ->with('tags')
                        ->orderBy('tags_count', 'desc')
                        ->first();
    }
}
