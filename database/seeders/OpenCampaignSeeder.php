<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;

class OpenCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
