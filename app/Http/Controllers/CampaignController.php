<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;

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
        return view('user.sections.campaigns.show', [
            'campaign' => $campaign,
            'progress' => ($campaign->donations_sum_amount / $campaign->target_amount) * 100,
            'comments' => Comment::where('campaign_id', $campaign->id)->with('user')->paginate(5)
        ]);
    }
}
