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
}
