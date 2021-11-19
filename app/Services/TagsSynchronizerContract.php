<?php

namespace App\Services;

use App\Repositories\TagsRepositoryContract;
use Illuminate\Support\Collection;

interface TagsSynchronizerContract
{
    public function sync(Collection $tags,
                         HasTags $model,
                         TagsRepositoryContract $tagRepository);
}
