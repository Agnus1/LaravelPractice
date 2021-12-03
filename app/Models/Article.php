<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasCache;
use App\Models\Image;
use App\Services\HasImages;
use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;

class Article extends Model implements HasTags, HasImages
{
    use HasFactory;
    use HasCache;

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
