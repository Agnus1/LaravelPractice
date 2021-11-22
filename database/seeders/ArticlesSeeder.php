<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(30)->create();;
        $articles = Article::factory()
            ->count(30)
            ->state(new Sequence(
                function ($sequence) {
                    if ($sequence->index < 5) {
                        return ['published_at' => Factory::create()->dateTimeThisMonth()];
                    }
                    return [];
                }
            ))
            ->create();

        foreach ($articles as $article)
        {
            $article->tags()->sync($tags->random());
            $articles->random()->tags()->sync($tags->random(), $tags->random());
        }
    }
}
