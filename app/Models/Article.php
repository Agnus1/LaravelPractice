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

    public static function getLatest()
    {
        return self::query()
            ->select(['title', 'description', 'published_at', 'slug'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
