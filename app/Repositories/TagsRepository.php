<?php

namespace App\Repositories;

use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    public function upsert(array $values, $uniqueBy, $update = null)
    {
        return Tag::upsert($values, $uniqueBy, $update);
    }

    public function getByName($values)
    {
        return Tag::query()->whereIn('name', $values)->get();
    }
}
