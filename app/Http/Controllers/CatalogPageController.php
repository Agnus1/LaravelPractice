<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Repositories\CarsRepositoryContract;
use App\Repositories\CategoriesRepositoryContract;

class CatalogPageController extends Controller
{
    public function index(string $slug,
            CarsRepositoryContract  $carRepository,
            CategoriesRepositoryContract $categoryRepository
            )
    {
        $category = $categoryRepository->getBySlug($slug);
        $categoriesId = $categoryRepository->getBranchIds($slug);
        $cars = $carRepository->whereCategoriesIdPaginate($categoriesId->ToArray(), 16);
        
        return view('pages.catalog.index', ['cars' => $cars, 'category' => $category]);
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', ['car' => $car]);
    }
}
