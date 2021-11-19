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
    }
}
