<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cached;

class CachedModelChanged
{
    use Dispatchable, SerializesModels;

    public $cacheTags;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Cached $model)
    {
        $this->cacheTags = $model->getCacheTags();
    }
}
