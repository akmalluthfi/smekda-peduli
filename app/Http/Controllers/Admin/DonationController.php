<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DonationsExport;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DonationController extends Controller
{
    public function index(Request $request, Campaign $campaign)
    {
        $donations = $campaign->donations()->where('status', 'success')->latest();

        return view('admin.sections.campaigns.donations', [
            'campaign' => $campaign,
            'donations' => $donations->paginate()
        ]);
    }

    public function export(Request $request, Campaign $campaign)
    {
        return Excel::download(new DonationsExport($campaign), 'donations.xlsx');
    }
}
