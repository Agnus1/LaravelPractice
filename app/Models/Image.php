<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Article;
use App\Models\Banner;

class Image extends Model
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
}
