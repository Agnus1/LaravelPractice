<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Article;

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
}
