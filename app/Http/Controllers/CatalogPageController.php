<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CatalogPageController extends Controller
{
    public function index()
    {
        $cars = \App\Models\Car::query()
            ->select([
                'id', 'name', 'price',
                'old_price', 'body',
                'salon', 'kpp', 'year',
                'car_class_id', 'car_body_id',
                'car_engine_id', 'color',
            ])
            ->get();

        return view('pages.catalog.index', ['cars' => $cars]);
    }

    public function show(Car $car)
    {
        return view('pages.catalog.show', ['car' => $car]);
    }
}
