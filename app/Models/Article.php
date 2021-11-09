<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $casts = [
        'published_at' => 'date: d M Y'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
