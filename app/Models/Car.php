<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;


    public function carClass()
    {
        return $this->hasOne(CarClass::class, 'car_class_id');
    }

    public function carBody()
    {
        return $this->hasOne(CarBody::class, 'car_body_id');
    }

    public function carEngine()
    {
        return $this->hasOne(CarEngine::class, 'car_engine_id');
    }
}
