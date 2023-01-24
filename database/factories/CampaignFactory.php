<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . time(),
            'image' => 'campaings-image/card.jpg',
            'target_amount' => rand(1, 3) * 1000000,
            'duration' => date('Y-m-d H:i:s', strtotime("+" . rand(1, 7) . " days")),
            'description' => fake()->text(400),
            'status' => 'open',
        ];
    }
}
