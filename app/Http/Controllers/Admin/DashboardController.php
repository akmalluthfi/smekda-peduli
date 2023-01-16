<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $completed_campaings = Campaign::completed()->count();
        $open_campaigns = Campaign::open()->count();

        $donation = Donation::where('status', 'success');
        $donation_count = $donation->count();
        $donation_sum = $donation->sum('amount');

        return view('admin.sections.dashboard', [
            'campaigns' => [
                'total' => $completed_campaings + $open_campaigns,
                'open' => $open_campaigns,
                'completed' => $completed_campaings
            ],
            'donation_count' => $donation_count,
            'donation_sum' => $donation_sum
        ]);
    }
}
