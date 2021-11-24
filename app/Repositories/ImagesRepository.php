<?php

namespace App\Repositories;

use App\Models\Image;
use App\Repositories\ImagesRepositoryContract;

class ImagesRepository implements ImagesRepositoryContract
{
    public function create(string $name, string $path) : Image
    {
        return Image::query()->create(['name' => $name, 'path' => $path]);
    }
    
    public function deleteOrFail(Image $oldImage) : bool|null
    {
        try {
            $oldImage->deleteOrFail();
            $result = true;
        } catch (\Exception $e) {
            $result = false;
        }   
        return $result;
    }
}
