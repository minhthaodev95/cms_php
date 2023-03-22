<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'author_id' => $this->faker->numberBetween(1, 10),
            'feature_image_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'slug' => $this->faker->slug,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'deleted_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'featured' => $this->faker->boolean,
            'views' => $this->faker->numberBetween(1, 1000),
            'likes' => $this->faker->numberBetween(1, 1000),
            'dislikes' => $this->faker->numberBetween(1, 1000),
            'comments' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
