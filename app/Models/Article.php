<?php

namespace App\Models;

use App\Services\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;
use App\Services\HasImages;
use App\Models\Cached;
use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use App\Events\CachedModelChanged;

class Article extends Cached implements HasTags, HasImages
{
    use HasFactory;

    public $guarded = [];

    protected static function booted()  
    {
        static::created(function ($article) {
            event(new ArticleCreated($article));
        });
        static::updated(function ($article) {
            event(new ArticleUpdated($article));
        });
        static::deleted(function ($article) {
            event(new ArticleDeleted($article));
        });
    }

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

    public function getCacheTags() : string
    {
        return 'articles';
    }
    
}
