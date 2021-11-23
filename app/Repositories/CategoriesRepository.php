<?php

namespace App\Repositories;

use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function getRoots()
    {
        return Category::whereIsRoot()->orderBy('sort')->get();   
    }
}
