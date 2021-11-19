<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Repositories\CarsRepositoryContract;

class CatalogPageController extends Controller
{
    public function index(CarsRepositoryContract  $carRepository)
    {
        $cars = $carRepository->paginate(16);

        return view('pages.catalog.index', ['cars' => $cars]);
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', ['car' => $car]);
    }
}
