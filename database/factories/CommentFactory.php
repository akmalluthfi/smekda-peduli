<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'as_anonymous' => fake()->boolean(),
            'body' => fake()->paragraph(2, true),
            'status' => fake()->randomElement(['success', 'pending', 'failed']),
            'user_id' => null,
            'campaign_id' => rand(1, 20),
        ];
    }
}
