<?php

namespace Database\Seeders;

use App\Models\CarClass;
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
        $this->call([
            ArticlesSeeder::class,
            CarPartsSeeder::class,
        ]);
    }
}
