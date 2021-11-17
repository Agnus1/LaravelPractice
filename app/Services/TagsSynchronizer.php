<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $veriftiedTags = $tags->unique()->values()->each->combine(['name']);

        foreach ($tags as $tag) {
            Tag::firstOrCreate($tag);
        }

        Article::insert($tags);
    }
}
