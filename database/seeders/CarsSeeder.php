<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()
            ->count(20)
            ->state(new Sequence(
                function ($sequence) {
                    return [
                        
                    ];
                }
            ))
            ->create();
    }
}
