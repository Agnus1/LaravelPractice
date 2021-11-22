<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TagsRepositoryContract
{
    public function upsert(array $values, $uniqueBy, $update = null);
    public function getByName($values);
}
