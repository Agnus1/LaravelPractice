<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;
use App\Repositories\TagsRepositoryContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;

class TagsSynchronizer
{
    public function sync(Collection $tags,
                         HasTags $model,
                         TagsRepositoryContract $tagRepository)
    {
        if ($tags->isEmpty()) {
            $model->tags()->sync([]);
            return;
        }

        $tagRepository->upsert($tags->get('tags'), ['name']);
        $tagNames = Arr::pluck($tags->get('tags'), 'name');
        $tagsId = $tagRepository->getByName($tagNames)->pluck('id');

        $model->tags()->sync($tagsId->flatten()->toArray());
    }
}
