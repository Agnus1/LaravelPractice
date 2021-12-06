<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsRepository implements CarsRepositoryContract
{
    private $cacheTags = ['cars', 'images', 'categories'];
    
    public function create(array $attributes) : Car
    {
        return Car::create($attributes);
    }

    public function delete(int $id)
    {
        $car = Car::find($id);
        if (is_null($car)) {
            throw new \Exception('Model not found');
        }
        return Car::find($id)->delete();
    }

    public function update(int $id, array $values) : Car
    {
        $car = Car::find($id);
        if (is_null($car)) {
            throw new \Exception('Model not found');
        }
        $car->update($values);
        return $car;
    }

    public function get() : Collection
    {
        return Car::get();
    }


    public function getById(int $id) : Car
    {
        $car = \Cache::tags($this->cacheTags)->remember(
            'cars.getById.' . $id, 
            now()->addMinutes(60), 
            function () use ($id) {
                return Car::with(['image', 'images_pivot', 'carEngine', 'carClass', 'carBody', 'category'])
                            ->find($id);
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
    
    public function whereCategoriesIdPaginate(array $categoriesId, int $count, int $page) : LengthAwarePaginator
    {
        $sectionIdString = (implode('-',$categoriesId));
        
        $section = \Cache::tags($this->cacheTags)->remember(
                    'cars.whereCategoriesId.' . $sectionIdString . '.Paginate.' . $page . '-' . $count, 
                    now()->addMinutes(60), 
                    function () use ($categoriesId, $count) {
                        return Car::whereIn('category_id', $categoriesId)
                                    ->with('image')
                                    ->latest('year')
                                    ->paginate($count);
                    });
            
        return $section;
    }

    public function getCount() : int
    {
        return Car::count();
    }
}
