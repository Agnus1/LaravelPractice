<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Image;
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
        $tags = Tag::factory()->count(30)->create();
        $images = Image::get();

        $articles = Article::factory()
            ->count(30)
            ->state(new Sequence(
                function ($sequence) use ($images) {
                    $isPublished = $sequence->index < 5;

                    $attributes = [
                        'image_id' => $images->random(),
                    ];
                    
                    if ($isPublished){
                        array_merge(['published_at' => Factory::create()->dateTimeThisMonth()], $attributes);
                    }

                    return $attributes;
                }
            ))
            ->create();
        
        foreach ($articles as $article) {
            $count = rand(1, 3);
            $article->tags()->sync($tags->random($count)->pluck('id'));
        }
    }
}
