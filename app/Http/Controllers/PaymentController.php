<?php

namespace App\Http\Controllers;

use App\Models\Donation;

class PaymentController extends Controller
{
    public function index(Donation $donation)
    {
        return view('payments.index', [
            'donation' => $donation
        ]);
    }
}
