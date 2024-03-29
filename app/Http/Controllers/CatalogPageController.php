<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Repositories\CarsRepositoryContract;
use App\Repositories\CategoriesRepositoryContract;
use Illuminate\Support\Facades\Cache;

class CatalogPageController extends Controller
{
    
    private $carsRepository;
    private $categoryRepository;
    
    public function __construct(CarsRepositoryContract  $carsRepository,
                                CategoriesRepositoryContract $categoryRepository
    )
    {
        $this->middleware('auth');
        $this->carsRepository = $carsRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    public function index(string $slug)
    {
        $page = request('page') ?? 1;
        $category = $this->categoryRepository->getBySlug($slug);
        $categoriesId = $this->categoryRepository->getBranchIds($slug);
        $cars = $this->carsRepository->whereCategoriesIdPaginate($categoriesId->ToArray(), 16, $page);

        return view('pages.catalog.index', ['cars' => $cars, 'category' => $category]);
    }
    
    public function show(int $id)
    {
        $car = $this->carsRepository->getById($id);
        return view('pages.catalog.show', ['car' => $car]);
    }
}
