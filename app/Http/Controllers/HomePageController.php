<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function homepage()
    {
        $articles = \App\Models\Article::getLatest();
        $cars = \App\Models\Car::query()
            ->select([
                'id', 'name', 'price',
                'old_price','body',
                'salon', 'kpp', 'year',
                'car_class_id', 'car_body_id',
                'car_engine_id', 'color',
            ])
            ->where('is_new', '>', '0')
            ->limit(4)
            ->get();;

        return view('pages.homepage', ['articles' => $articles, 'cars' => $cars]);
    }
}
