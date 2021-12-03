<?php

namespace App\Services;

use App\Repositories\TagsRepositoryContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class TagsSynchronizer implements TagsSynchronizerContract
{
    private $tagsRepository;
    
    public function __construct(TagsRepositoryContract $tagsRepository) {
        $this->tagsRepository = $tagsRepository;
    }
    
    public function sync(Collection $tags, HasTags $model)
    {
        if ($tags->isEmpty()) {
            $model->tags()->detach();;
            return;
        }
        $this->tagsRepository->upsert($tags->get('tags'), ['name']);
        $tagNames = Arr::pluck($tags->get('tags'), 'name');
        $tagsId = $this->tagsRepository->getByNames($tagNames)->pluck('id');

        $model->tags()->sync($tagsId->flatten()->toArray());
    }
}
