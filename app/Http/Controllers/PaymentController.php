<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Donation $donation)
    {
        dd($donation);
        return view('payments.index');
    }
}
