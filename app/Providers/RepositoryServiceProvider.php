<?php

namespace App\Providers;

use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\CarsRepository;
use App\Repositories\CarsRepositoryContract;
use App\Repositories\TagsRepository;
use App\Repositories\TagsRepositoryContract;
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
        app()->bind(CarsRepositoryContract::class, CarsRepository::class);
        app()->bind(ArticlesRepositoryContract::class, ArticlesRepository::class);
        app()->bind(TagsRepositoryContract::class, TagsRepository::class);
    }
}
