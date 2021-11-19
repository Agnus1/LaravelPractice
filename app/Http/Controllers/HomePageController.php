<?php

namespace App\Http\Controllers;

use \App\Models\Car;
use App\Models\Article;
use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\CarsRepositoryContract;

class HomePageController extends Controller
{
    public function homepage(ArticlesRepositoryContract $articlesRepository,
                             CarsRepositoryContract     $carsRepository
    )
    {
        $articles = $articlesRepository->getLatest(3);
        $cars = $carsRepository->getNew(4);

        return view('pages.homepage', ['articles' => $articles, 'cars' => $cars]);
    }
}
