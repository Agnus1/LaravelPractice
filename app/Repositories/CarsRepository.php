<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsRepository implements CarsRepositoryContract
{
    private $cacheTags = ['cars', 'images'];
    
    public function getById(int $id) : Car
    {
        $car = \Cache::tags($this->cacheTags)->remember(
            'cars.getById.' . $id, 
            now()->addMinutes(60), 
            function () use ($id) {
                return Car::find($id)
                            ->with(['image', 'images_pivot'])
                            ->get()
                            ->first();
            });
        
        return $car;
    }


    public function getNew(int $count) : Collection
    {
        $newCars = \Cache::tags($this->cacheTags)->remember(
            'cars.getNew.' . $count, 
            now()->addMinutes(60), 
            function () use ($count) {
                return Car::where('is_new', '>', '0')
                            ->limit($count)
                            ->with('image')
                            ->get();
            });

        return $newCars;
    }
    
    public function whereCategoriesIdPaginate(array $categoriesId, int $paginate) : LengthAwarePaginator
    {
        $sectionIdString = (implode('-',$categoriesId));
        $section = \Cache::tags($this->cacheTags)->remember(
            'cars.whereCategoriesIdPaginate.' . $sectionIdString, 
            now()->addMinutes(60), 
            function () use ($categoriesId, $paginate) {
                return Car::whereIn('category_id', $categoriesId)
                            ->with('image')
                            ->latest('year')
                            ->paginate($paginate);
            });
            
        return $section;
    }
}
