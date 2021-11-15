<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CarClass;
use App\Models\CarBody;
use App\Models\CarEngine;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'body' => $this->faker->realText,
            'price' => $this->faker->numberBetween(500000, 1000000),
            'salon' => $this->faker->word,
            'car_class_id' => CarClass::factory(),
            'kpp' => $this->faker->word,
            'year' => $this->faker->dateTimeThisCentury,
            'color' => $this->faker->word,
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
        ];
    }
}
