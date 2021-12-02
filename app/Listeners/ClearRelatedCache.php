<?php

namespace App\Listeners;

use App\Events\CachedModelChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClearRelatedCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CachedModelChanged  $event
     * @return void
     */
    public function handle(CachedModelChanged $event)
    {
        \Cache::tags($event->cacheTags)->flush();
    }
}
