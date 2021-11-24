<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function create(array $attributes) : Article
    {
        return Article::create($attributes);
    }

    public function paginate(int $count) : LengthAwarePaginator
    {
        return Article::whereNotNull('published_at')
            ->latest('published_at')
            ->paginate($count);
    }

    public function getLatest($count) : Collection
    {
        return Article::query()->whereNotNull('published_at')
            ->latest('published_at')
            ->limit($count)
            ->get();
    }
    public function get() : Collection
    {
        return  Article::get();
    }
    
    public function findBySlug(string $slug) : Article
    {
        return Article::where('slug', $slug)->get()->first();
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
}
