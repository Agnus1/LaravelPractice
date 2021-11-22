<?php

namespace App\Http\Controllers;

use \App\Models\Car;
use App\Models\Article;

class HomePageController extends Controller
{
    public function homepage()
    {
        $articles = Article::getLatest();
        $cars = Car::query()
            ->where('is_new', '>', '0')
            ->limit(4)
            ->get();

        return view('pages.homepage', ['articles' => $articles, 'cars' => $cars]);
    }
}
