<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Cached;

class Banner extends Cached
{
    use HasFactory;
    
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function getCacheTags() : string
    {
        return 'banners';
    }
}
