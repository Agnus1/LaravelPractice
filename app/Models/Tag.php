<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasCache;

class Tag extends Model
{
    use HasFactory;
    use HasCache;
    
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function getCacheTags() : string
    {
        return 'tags';
    }
}
