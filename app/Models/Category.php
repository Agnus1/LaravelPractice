<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;
    
        public static function booted()
    {
        static::created(function () {
            \Cache::tags(['categories'])->flush();
        });
        static::updated(function () {
            \Cache::tags(['categories'])->flush();
        });
        static::deleted(function () {
            \Cache::tags(['categories'])->flush();
        });
    }
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
