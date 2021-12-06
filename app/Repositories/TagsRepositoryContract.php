<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;

interface TagsRepositoryContract
{
    public function upsert(array $values, $uniqueBy, $update = null);
    public function getByNames(array $values) : Collection;
    public function getMostUsefulTag() : Tag;
    public function getAverageArticlesCount() : float;
}
