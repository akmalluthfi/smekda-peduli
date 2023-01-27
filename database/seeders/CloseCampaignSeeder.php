<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;

class CloseCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $campaign = Campaign::factory()->create([
                'status' => 'close',
                'duration' => date('Y-m-d H:i:s', strtotime("-" . rand(1, 7) . " days"))
            ]);

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
