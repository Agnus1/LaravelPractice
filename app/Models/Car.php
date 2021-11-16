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
}
