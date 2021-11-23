<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagsRepository implements TagsRepositoryContract
{
    public function upsert(array $values, $uniqueBy, $update = null)
    {
        Tag::upsert($values, $uniqueBy, $update);
    }

    public function getByNames(array $values) : Collection
    {
        return Tag::query()->whereIn('name', $values)->get();
    }
}
