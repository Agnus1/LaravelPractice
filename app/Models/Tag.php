<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::created(function () {
            \Cache::tags(['tags'])->flush();
        });
        static::updated(function () {
            \Cache::tags(['tags'])->flush();
        });
        static::deleted(function () {
            \Cache::tags(['tags'])->flush();
        });
    }
    
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
