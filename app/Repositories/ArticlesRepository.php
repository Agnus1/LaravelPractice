<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function create(array $attributes) : Article
    {
        return Article::create($attributes);
    }

    public function paginate(int $count)
    {
        return Article::whereNotNull('published_at')
            ->latest('published_at')
            ->paginate($count);
    }

    public function getLatest($count)
    {
        return Article::query()->whereNotNull('published_at')
            ->latest('published_at')
            ->limit($count)
            ->get();
    }
    public function get()
    {
        return  Article::get();
    }

}
