<?php

namespace App\Models;

use App\Services\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Services\HasImages;

class Article extends Model implements HasTags, HasImages
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

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    
}
