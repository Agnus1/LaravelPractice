<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;

class BannersRepository implements BannersRepositoryContract
{
    private $cacheTags = ['banners', 'images'];
    
    public function getRandom(int $count): Collection
    {
        $banners = \Cache::tags($this->cacheTags)->remember(
            'banners.getRandom.' . $count, 
            now()->addMinutes(60), 
            function () use ($count) {
                return Banner::inRandomOrder()
                               ->limit($count)
                               ->with('image')
                               ->get();
            });
            
        return $banners;
    }

}
