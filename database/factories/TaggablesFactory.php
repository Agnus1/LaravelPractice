<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use App\Models\Taggables;

class TaggablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'tag_id' => Tag::factory(),
            'taggable_id' => Article::factory(),
            'taggable_type' => Article::class,
        ];
    }
}
