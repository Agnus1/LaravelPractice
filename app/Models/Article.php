<?php

namespace App\Models;

use App\Services\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements HasTags
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

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
