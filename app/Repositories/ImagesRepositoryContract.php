<?php

namespace App\Repositories;

use App\Models\Image;

interface ImagesRepositoryContract
{
    public function create(string $name, string $path) : Image;
    public function deleteOrFail(Image $oldImage) : bool|null;
}
