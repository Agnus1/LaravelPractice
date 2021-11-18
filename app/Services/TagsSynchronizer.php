<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        if ($tags->isEmpty()) {
            $model->tags()->sync([]);
            return;
        }

        Tag::upsert($tags->get('tags'), ['name']);
        $tagsId = collect();
        $allTags = Tag::all();
        $tagNames = Arr::pluck($tags->get('tags'), 'name');

        foreach ($tagNames as $tagName) {
                $tagsId->push($allTags->where('name', $tagName)->pluck('id'));
            }

        $model->tags()->sync($tagsId->flatten()->toArray());
    }
}
