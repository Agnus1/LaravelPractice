<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Car;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Cached;

class Image extends Cached
{
    use HasFactory;

    public $guarded = [];
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
    public function cars_pivot()
    {
        return $this->belongsToMany(Car::class, 'car_image', 'image_id', 'car_id');
    }
    
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function getCacheTags() : string
    {
        return 'images';
    }
}
