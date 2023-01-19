<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Builder;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $campaigns = Campaign::latest()->withDonationsAmount()->open();

        if ($request->query('q')) {
            $campaigns->search($request->query('q'));
        }

        return view('user.sections.campaigns.index', [
            'campaigns' => $campaigns->paginate(
                15,
                ['title', 'slug', 'target_amount', 'duration']
            )->appends(
                ['s' => $request->query('s'), 'q' => $request->query('q')]
            )
        ]);
    }

    public function show(Request $request, Campaign $campaign)
    {
        $comments = $campaign->comments()->whereHas('donation', function (Builder $query) {
            $query->where('status', 'success');
        })->latest();

        return view('user.sections.campaigns.show', [
            'campaign' => $campaign,
            'progress' => ($campaign->donations_sum_amount / $campaign->target_amount) * 100,
            'comments' => $comments->paginate(10),
        ]);
    }
}
