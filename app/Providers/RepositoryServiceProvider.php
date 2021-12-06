<?php

namespace App\Providers;

use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\CarsRepository;
use App\Repositories\CarsRepositoryContract;
use App\Repositories\TagsRepository;
use App\Repositories\TagsRepositoryContract;
use App\Services\TagsSynchronizer;
use App\Services\TagsSynchronizerContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoriesRepository;
use App\Repositories\CategoriesRepositoryContract;
use App\Repositories\ImagesRepository;
use App\Repositories\ImagesRepositoryContract;
use App\Repositories\BannersRepository;
use App\Repositories\BannersRepositoryContract;
use App\Repositories\SalonsRepository;
use App\Repositories\SalonsRepositoryContract;
use App\Services\ImagesSynchronizerContract;
use App\Services\ImagesSynchronizer;
use App\Services\StatisticsCollectorContract;
use App\Services\StatisticsCollector;
use App\Services\SalonsClientService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton(CarsRepositoryContract::class, CarsRepository::class);
        app()->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        app()->singleton(TagsRepositoryContract::class, TagsRepository::class);
        app()->singleton(TagsSynchronizerContract::class, TagsSynchronizer::class);
        app()->singleton(ImagesSynchronizerContract::class, ImagesSynchronizer::class);
        app()->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
        app()->singleton(SalonsClientService::class, function () {
            return new SalonsClientService(config('salons.login'), config('salons.password'));
        });
        app()->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
        app()->singleton(BannersRepositoryContract::class, BannersRepository::class);
        app()->singleton(StatisticsCollectorContract::class, StatisticsCollector::class);
        app()->singleton(SalonsRepositoryContract::class, SalonsRepository::class);
    }
}
