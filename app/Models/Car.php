<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $casts = [
        'year' => 'date: d M Y'
    ];

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
    
    public function image() {
        return $this->belongsTo(Image::class);
    }
    
    public function images_pivot()
    {
        return $this->belongsToMany(Image::class, 'car_image', 'car_id', 'image_id');
    }
}
