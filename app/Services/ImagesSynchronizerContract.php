<?php

namespace App\Services;

use App\Services\HasImages;
use Illuminate\Support\Collection;

interface ImagesSynchronizerContract
{
    public function sync(Collection $attributes, HasImages $model);
}
