<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;

class BannersRepository implements BannersRepositoryContract
{
    
    public function getRandom(int $count): Collection
    {
        return Banner::inRandomOrder()->limit($count)->get();
    }

}
