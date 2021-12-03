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

    public function getMostUsefulTag() : Tag
    {
        return Tag::withCount('articles')
                    ->orderByDesc('articles_count')
                    ->limit(1)
                    ->get()
                    ->first();
    }

    public function getAverageArticlesCount() : float
    {
        return \DB::table(function ($query) {
            $query->selectRaw('COUNT(*) as amount')
                  ->from('tags')
                  ->rightJoin('taggables', 'tags.id', '=', 'taggables.tag_id')
                  ->groupBy('id');
        })->avg('amount');;
    }
}
