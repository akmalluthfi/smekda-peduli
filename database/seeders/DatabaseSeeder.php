<?php

namespace Database\Seeders;

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

        $this->call([
            OpenCampaignSeeder::class,
            CloseCampaignSeeder::class,
            FAQSeeder::class
        ]);
    }
}
