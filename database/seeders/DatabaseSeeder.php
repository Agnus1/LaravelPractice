<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use \Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
