<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function getDescendantsOnDepth($operator, $depth)
    {
        return $this->descendants()->withDepth()->having('depth', $operator, $depth)->orderBy('sort')->get();
    }
}
