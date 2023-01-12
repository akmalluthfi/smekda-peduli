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

        \App\Models\Campaign::factory(20)->create();

        \App\Models\Campaign::factory(10)->create([
            'status' => 'completed'
        ]);

        \App\Models\Donation::factory(100)->create([
            'status' => 'success'
        ]);

        \App\Models\Donation::factory(50)->create([
            'status' => fake()->randomElement(['pending', 'failed'])
        ]);

        \App\Models\Comment::factory(50)->create();

        \App\Models\Comment::factory(100)->create([
            'user_id' => null
        ]);

        $this->call([
            PaymentSeeder::class,
        ]);
    }
}
