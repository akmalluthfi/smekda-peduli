<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Alfi',
            'email' => 'alfi@gmail.com',
            'is_admin' => false
        ]);

        for ($i = 0; $i < 10; $i++) {
            $campaign = Campaign::factory()->create();

            for ($j = 0; $j < rand(3, 10); $j++) {
                if (fake()->boolean()) {
                    $comment = Comment::factory()->create(['campaign_id' => $campaign->id]);

                    Donation::factory()->create([
                        'campaign_id' => $campaign->id,
                        'comment_id' => $comment->id
                    ]);
                } else {
                    Donation::factory()->create([
                        'campaign_id' => $campaign->id,
                        'comment_id' => null
                    ]);
                }
            }
        }
    }
}
