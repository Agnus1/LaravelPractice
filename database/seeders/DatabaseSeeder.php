<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $this->call([
            ArticlesSeeder::class,
            TagsSeeder::class,
            TaggablesSeeder::class,
//            CarsSeeder::class,
//            CarPartsSeeder::class,
        ]);
    }
}
