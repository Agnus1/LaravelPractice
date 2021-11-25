<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            ImageSeeder::class,
            ArticlesSeeder::class,
            CarPartsSeeder::class,
            CategorySeeder::class,
            CarsSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
