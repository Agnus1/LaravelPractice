<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ArticlesRepositoryContract
{
    public function create(array $attributes) : Article;
    public function paginate(int $count, $page) : LengthAwarePaginator;
    public function getLatest(int $count) : Collection;
    public function get() : Collection;
    public function findBySlug(string $slug) : Article;
    public function delete(string $slug);
    public function update(string $slug, array $values) : Article;
    public function make(array $attributes) : Article;
    public function save(Article $article);
    public function getCount() : int;
    public function getOrderByBody(string $direction = 'desc') : Article;
    public function getMostTaged() : Article;
}
