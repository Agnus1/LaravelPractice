<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Nette\Utils\Random;

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
                    $attributes = ['is_new' => rand(0, 1)];
                    if ($sequence->index >= 5 && rand(0, 1))
                        $attributes = array_merge($attributes, ['car_body_id' => null]);
                    return $attributes;
                }
            ))
            ->create();
    }
}
