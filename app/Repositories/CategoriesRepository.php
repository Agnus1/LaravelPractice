<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoriesRepository implements CategoriesRepositoryContract
{
    private $cacheTags = ['categories', 'cars'];
    
    public function getRoots() : Collection
    {   
        $roots = \Cache::tags($this->cacheTags)->remember(
                    'getRoots',
                    now()->addMinutes(60),
                    function () {
                        return Category::whereIsRoot()
                                        ->orderBy('sort')
                                        ->with('children')
                                        ->get();

                    }
                 );
        
        return $roots;
    }
    
    public function getBySlug(string $slug) : Category
    {
        $category = \Cache::tags($this->cacheTags)->remember(
                        'getBySlug.' . $slug, 
                        now()->addMinutes(60),
                        function () use ($slug)  {
                            return Category::where('slug', $slug)
                                            ->with('ancestors')
                                            ->get()
                                            ->toTree()
                                            ->first();
                            
                        }
                    );
        
        return $category;
    }

    public function getBranchIds(string $slug) : Collection
    {
        $branch = \Cache::tags($this->cacheTags)->remember(
            'getBranchIds.' . $slug, 
            now()->addMinutes(60), 
            function () use ($slug) {
                return Category::withDepth()
                                ->having('depth', '<=', 1)
                                ->descendantsAndSelf($this->getBySlug($slug))
                                ->pluck('id');
            });
            
        return $branch;
    }
}
