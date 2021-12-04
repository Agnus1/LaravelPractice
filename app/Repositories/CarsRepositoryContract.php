<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CarsRepositoryContract
{
    public function getById(int $id) : Car;
    public function getNew(int $count) : Collection;
    public function whereCategoriesIdPaginate(array $categoriesId, int $count, int $page) : LengthAwarePaginator;
    public function getCount() : int;
    public function create(array $attributes) : Car;
    public function get() : Collection;
    public function update(int $id, array $values) : Car;
    public function delete(int $id);
}
