<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticlesRepositoryContract
{
    public function create(array $attributes) : Article;
    public function paginate(int $count);
    public function getLatest(int $count);
    public function get();
}
