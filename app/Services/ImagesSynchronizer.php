<?php

namespace App\Services;

use App\Services\HasImages;
use App\Repositories\ImagesRepositoryContract;
use Illuminate\Support\Collection;
use App\Models\Car;

class ImagesSynchronizer implements ImagesSynchronizerContract
{
    
    private $imageRepository;
    
    public function __construct(ImagesRepositoryContract $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
    
    public function sync(Collection $attributes, HasImages $model)
    {
        if ($attributes->isEmpty()) {
            return;
        }
        
        $path = $attributes->get('image')->store('images');
        $name = $attributes->get('name');
        $imageModel = $this->imageRepository->create($name, $path);
        $oldImage = $model->image;
        $model->image()->associate($imageModel)->save();
        
        if ($oldImage) {
            $this->imageRepository->deleteOrFail($oldImage);
        }
    }
}
