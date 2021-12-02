<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Traits\HasCache;

class Banner extends Model
{
    use HasFactory;
    use HasCache;
    
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function getCacheTags() : string
    {
        return 'banners';
    }
}
