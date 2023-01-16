<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donate>
 */
class DonationFactory extends Factory
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
            'status' => fake()->randomElement(['success', 'pending', 'failed']),
            'amount' => fake()->randomElement([10, 30, 50, 75, 100]) * 1000,
            'user_id' => null,
            'campaign_id' => rand(1, 20),
        ];
    }
}
