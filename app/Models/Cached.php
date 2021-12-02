<?php

namespace App\Models;

use App\Events\CachedModelChanged;
use Illuminate\Database\Eloquent\Model;

abstract class Cached extends Model
{
    abstract public function getCacheTags() : array|string;

    protected $dispatchesEvents = [
        'created' => CachedModelChanged::class,
        'updated' => CachedModelChanged::class,
        'deleted' => CachedModelChanged::class,
    ];
}
