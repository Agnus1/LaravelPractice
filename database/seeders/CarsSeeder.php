<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use App\Models\CarClass;
use App\Models\CarBody;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engines = CarEngine::get();
        $classes = CarClass::get();
        $bodies = CarBody::get();
        $categories = Category::get();
        $images = Image::get();

        $cars = Car::factory()
            ->count(7)
            ->state(new Sequence(
                function ($sequence) use ($engines, $classes, $bodies, $categories, $images) {
                    $doSeed = $sequence->index < 5;
                    $attributes = [
                        'car_engine_id' => rand(0, 1) || $doSeed ? $engines->random() : null,
                        'car_class_id' => rand(0, 1) || $doSeed ? $classes->random() : null,
                        'car_body_id' => rand(0, 1) || $doSeed ? $bodies->random() : null,
                        'is_new' => rand(0, 1),
                        'category_id' => $categories->random(),
                        'image_id' => $images->random(),
                    ];
                    return $attributes;
                }
            ))
            ->create();

        foreach ($cars as $car) {
            $ids = $images->random(2)->pluck('id');
            $car->images_pivot()->sync($ids);
            $images = $images->except($ids->toArray());
        }
    }
}
