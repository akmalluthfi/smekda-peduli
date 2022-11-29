<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'image' => null,
            'target_amount' => rand(1, 10) . 1000000,
            'duration' => date('Y-m-d H:i:s', strtotime('+1 month')),
            'description' => fake()->text(400)
        ];
    }
}
