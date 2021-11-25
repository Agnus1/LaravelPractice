<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface BannersRepositoryContract
{
    public function getRandom(int $count) : Collection;
}
