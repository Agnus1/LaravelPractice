<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsRepository implements CarsRepositoryContract
{
    public function getNew(int $count) : Collection
    {
        return Car::query()
            ->where('is_new', '>', '0')
            ->limit($count)
            ->get();
    }
    
    public function whereCategoriesIdPaginate(array $categoriesId, int $paginate) : LengthAwarePaginator
    {
        return Car::whereIn('category_id', $categoriesId)->latest('year')->paginate($paginate);
    }
}
