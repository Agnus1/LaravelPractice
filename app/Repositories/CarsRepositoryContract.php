<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CarsRepositoryContract
{
    public function getNew(int $count) : Collection;
    public function whereCategoriesIdPaginate(array $categoriesId, int $paginate) : LengthAwarePaginator;
}
