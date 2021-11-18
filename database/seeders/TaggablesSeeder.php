<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\Taggables;

class TaggablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::get();
        $articles = Article::get();

        Taggables::factory()
            ->count(30)
            ->state(function (array $attributes) use ($articles, $tags) {
                return [
                    'tag_id' => $tags->random(),
                    'taggable_id' => $articles->random(),
                ];
            })->create();
    }
}
