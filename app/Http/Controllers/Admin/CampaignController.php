<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campaigns = Campaign::latest()->withDonationsAmount();

        if ($request->query('q')) {
            $campaigns->search($request->query('q'));
        }

        if ($request->query('s') === 'open') {
            $campaigns->open();
        }

        if ($request->query('s') === 'completed') {
            $campaigns->completed();
        }

        return view('admin.sections.campaigns.index', [
            'campaigns' => $campaigns->paginate(
                15,
                ['title', 'slug', 'target_amount', 'duration']
            )->appends(
                ['s' => $request->query('s'), 'q' => $request->query('q')]
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreCampaignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('campaings-image');

        Campaign::create($validatedData);

        return redirect('/admin/campaigns')->with('success', 'Campaign create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $donations = $campaign->donations()->paginate(5)->fragment('donation');

        // $donations = Donation::where('campaign_id', $campaign->id)
        //     ->with('user:id,name', 'payment:id,method')
        //     ->paginate(5)
        //     ->fragment('donation');

        return view('admin.sections.campaigns.show', [
            'campaign' => $campaign,
            'donations' => $donations,
            'progress' => ($campaign->donations_sum_amount / $campaign->target_amount) * 100
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('admin.sections.campaigns.edit', [
            'campaign' => $campaign
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        if ($campaign->image) {
            Storage::delete($campaign->image);
        }

        $campaign->delete();

        return redirect('/admin/campaigns')->with('success', 'Campaign delete successfully');
    }
}
