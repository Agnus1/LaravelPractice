<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->realText(75),
            'description' => $this->faker->realText(140),
            'body' => $this->faker->realText(1000),
            'published_at' => (rand(0, 1) ? $this->faker->dateTimeThisMonth('now') :  NULL)
        ];
    }
}
