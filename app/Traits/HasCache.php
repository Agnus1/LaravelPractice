<?php

namespace App\Traits;

trait HasCache
{
    public static function bootHasCache()
    {
        static::created(function($model) {
            \Cache::tags($model->getCacheTags())->flush();
        });
        static::updated(function($model) {
            \Cache::tags($model->getCacheTags())->flush();
        });
        static::deleted(function($model) {
            \Cache::tags($model->getCacheTags())->flush();
        });
    }

    abstract public function getCacheTags() : array|string;
}