<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cached;

class Tag extends Cached
{
    use HasFactory;

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function getCacheTags() : string
    {
        return 'tags';
    }
}
