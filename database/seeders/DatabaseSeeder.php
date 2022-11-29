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
            'name' => 'Alfi',
            'email' => 'alfi@gmail.com',
        ]);

        \App\Models\Campaign::factory(20)->create();

        \App\Models\Donation::factory(50)->create();

        \App\Models\Comment::factory(30)->create();

        $this->call([
            PaymentSeeder::class,
        ]);
    }
}
