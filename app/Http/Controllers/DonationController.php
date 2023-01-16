<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Campaign $campaign)
    {
        return view('donations.index', [
            'campaign' => $campaign
        ]);
    }

    public function store(Request $request)
    {
        // simpan pembayaran dengan status 
    }
}
