<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\Campaign::factory(20)->create();

        \App\Models\Campaign::factory(10)->create([
            'status' => 'close'
        ]);

        \App\Models\Donation::factory(100)
            ->create();

        \App\Models\Donation::factory(100)
            ->create([
                'email' => null,
                'name' => null,
                'user_id' => rand(1, 10),
            ]);
    }
}
