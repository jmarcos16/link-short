<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RichTextFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->paragraphs(3, true),
            'contentable_id' => fake()->numberBetween(1, 100),
        ];
    }
}
