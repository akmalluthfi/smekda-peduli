<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;

class DashboardController extends Controller
{
    public function index()
    {
        $completed_campaings = Campaign::completed()->count();
        $open_campaigns = Campaign::open()->count();

        $donation_success = Donation::where('status', 'success');
        $donation_other = Donation::whereNot('status', 'success')->count();

        $donation_sum = $donation_success->sum('amount');

        return view('admin.sections.dashboard', [
            'campaigns' => [
                'total' => $completed_campaings + $open_campaigns,
                'open' => $open_campaigns,
                'completed' => $completed_campaings
            ],
            'donation_count' => [
                'total'  => $donation_success->count() + $donation_other,
                'success' => $donation_success->count(),
                'other' => $donation_other,
            ],
            'donation_sum' => $donation_sum
        ]);
    }
}
