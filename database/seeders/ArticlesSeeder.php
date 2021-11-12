<?php

namespace Database\Seeders;

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
        \App\Models\Article::factory()
            ->count(10)
            ->state(new Sequence(
                function ($sequence) {
                    if ($sequence->index < 5) {
                        return ['published_at' => Factory::create()->dateTimeThisMonth()];
                    }
                    return [];
                }
            ))
            ->create();
    }
}
