<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        
        $fakeHtml = '<p>' . implode('</p><p>', $this->faker->paragraphs) . '</p>';

        return [
            'title' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['open', 'closed']),
            'user_id' => User::factory(),
            'content' => $fakeHtml,
        ];
    }
}
