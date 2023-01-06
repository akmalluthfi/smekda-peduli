<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = ['ShopeePay', 'GOPAY', 'DANA', 'BRI', 'BCA', 'Mandiri'];

        foreach ($methods as $method) {
            Payment::create([
                'method' => $method,
                'no' => fake()->randomNumber(9, true),
                'name' => 'SMKN 2 SBY'
            ]);
        }
    }
}
