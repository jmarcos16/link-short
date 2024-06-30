<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'original_url' => $this->faker->url,
            'short_url' => $this->faker->unique()->slug(1),
            'clicks' => $this->faker->numberBetween(0, 1000),
            'user_id' => 1,
            'last_count' => $this->faker->numberBetween(0, 1000),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
