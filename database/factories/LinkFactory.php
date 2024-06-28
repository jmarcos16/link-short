<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->url,
            'hash' => $this->faker->unique()->slug,
            'clicks' => $this->faker->numberBetween(0, 1000),
            'user_id' => 1,
            'last_count' => $this->faker->numberBetween(0, 1000),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
