<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function getRoots() : Collection
    {
        return Category::whereIsRoot()->orderBy('sort')->get();   
    }
    
    public function getBySlug(string $slug) : Category
    {
        return Category::where('slug', $slug)->get()->first();
    }

    public function getBranchIds(string $slug) : Collection
    {
        $model = $this->getBySlug($slug);
        return $model->getDescendantsOnDepth('=', 1)
                ->pluck('id')
                ->push($model->id);
    }
}
