<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Category;

interface CategoriesRepositoryContract
{
    public function getRoots() : Collection;
    public function getBySlug(string $slug) : Category;
    public function getBranchIds(string $slug) : Collection;
}
