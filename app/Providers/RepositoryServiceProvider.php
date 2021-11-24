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
use App\Services\ImagesSynchronizerContract;
use App\Services\ImagesSynchronizer;

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
        app()->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
        app()->singleton(BannersRepositoryContract::class, BannersRepository::class);
    }
}
