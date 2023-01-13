<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignDonationController extends Controller
{
    public function index(Campaign $campaign)
    {
        return view('user.sections.campaigns.donations.index', [
            'campaign' => $campaign
        ]);
    }

    public function store(Request $request)
    {
        // simpan pembayaran dengan status 
    }
}
