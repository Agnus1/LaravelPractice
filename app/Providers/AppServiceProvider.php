<?php

namespace App\Providers;

use App\Services\TagsSynchronizer;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Services\HasTags;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'rus.UTF-8');
        Carbon::setLocale(config('app.locale'));

    }
}
