<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\CachedModelChanged;
use App\Listeners\ClearRelatedCache;
use App\Events\ArticleCreated;
use App\Listeners\SendArticleCreatedMail;
use App\Events\ArticleUpdated;
use App\Listeners\SendArticleUpdatedMail;
use App\Events\ArticleDeleted;
use App\Listeners\SendArticleDeletedMail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CachedModelChanged::class => [
            ClearRelatedCache::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedMail::class,
        ],
        ArticleUpdated::class => [
            SendArticleUpdatedMail::class,
        ],
        ArticleDeleted::class => [
            SendArticleDeletedMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
