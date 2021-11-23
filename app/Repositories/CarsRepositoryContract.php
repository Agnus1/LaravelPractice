<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CarsRepositoryContract
{
    public function getNew(int $count);
    public function paginate(int $count);
    public function get();
    public function whereCategoriesId($categoriesId);
}
