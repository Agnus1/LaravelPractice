<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarsRepository implements  CarsRepositoryContract
{
    public function getNew(int $count) : Collection
    {
        return Car::query()
            ->where('is_new', '>', '0')
            ->limit($count)
            ->get();
    }

    public function paginate(int $count)
    {
        return Car::query()
            ->latest('year')
            ->paginate($count);
    }

    public function get(): Collection
    {
        return Car::get();
    }
}
