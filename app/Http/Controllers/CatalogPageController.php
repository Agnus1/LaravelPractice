<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Repositories\CarsRepositoryContract;
use App\Models\Category;

class CatalogPageController extends Controller
{
    public function index(CarsRepositoryContract  $carRepository, Category $category)
    {
        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->getKey();
        $cars = $carRepository->whereCategoriesId($categories)->paginate(16);
        
        return view('pages.catalog.index', ['cars' => $cars, 'category' => $category]);
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', ['car' => $car]);
    }
}
