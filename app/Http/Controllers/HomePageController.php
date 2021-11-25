<?php

namespace App\Http\Controllers;

use \App\Models\Car;
use App\Models\Article;
use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\CarsRepositoryContract;
use App\Repositories\BannersRepositoryContract;

class HomePageController extends Controller
{
    public function homepage(
                             ArticlesRepositoryContract $articlesRepository,
                             CarsRepositoryContract     $carsRepository,
                             BannersRepositoryContract  $bannersRepository,
    )
    {
        $articles = $articlesRepository->getLatest(3);
        $cars = $carsRepository->getNew(4);
        $banners = $bannersRepository->getRandom(3);
        return view('pages.homepage', ['articles' => $articles, 'cars' => $cars, 'banners' => $banners]);
    }
}
