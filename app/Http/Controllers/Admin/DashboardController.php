<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $payments = Payment::withCount('donations')->latest('donations_count')->get();
        $completed_campaings = Campaign::completed()->count();
        $open_campaigns = Campaign::open()->count();

        return view('admin.sections.static.dashboard', [
            'campaigns' => [
                'total' => $completed_campaings + $open_campaigns,
                'open' => $open_campaigns,
                'completed' => $completed_campaings
            ],
            'top_payments' => $payments,
            'payments_count' => $payments->count(),
        ]);
    }
}
