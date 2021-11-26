<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
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
            'path' => Str::afterLast($this->faker->image(public_path('storage' . DIRECTORY_SEPARATOR .'images')), 'storage' . DIRECTORY_SEPARATOR),
        ];
    }
}
