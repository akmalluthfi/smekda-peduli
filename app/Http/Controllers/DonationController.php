<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;
use App\Services\Midtrans\CreateSnapTokenService;

class DonationController extends Controller
{
    public function index(Campaign $campaign)
    {
        if ($campaign->status === 'close') return abort(404);

        return view('donations.index', [
            'campaign' => $campaign
        ]);
    }

    public function store(StoreDonationRequest $request, Campaign $campaign)
    {
        $validatedData = $request->validated();

        $donation = new Donation([
            'status' => 'created',
            'amount' => $validatedData['amount']
        ]);

        $donationID = $donation->newUniqueId();

        $donation->id = $donationID;

        $comment = Comment::create([
            'body' => $validatedData['comment'],
            'as_anonymous' => $request->has('as_anonymous'),
            'campaign_id' => $campaign->id
        ]);

        if (auth()->check()) {
            $donation->user_id = auth()->user()->id;
        } else {
            $donation->name = $validatedData['name'];
            $donation->email = $validatedData['email'];
        }

        // generate snap token 
        $params = [
            'transaction_details' => [
                'order_id' => $donationID,
                'gross_amount' => $validatedData['amount'],
            ],
            'item_details' => [
                [
                    'id' => $campaign->id,
                    'price' => $validatedData['amount'],
                    'quantity' => 1,
                    'name' => $campaign->title,
                ],
            ],
            'customer_details' => [
                'first_name' => auth()->check() ? auth()->user()->id : $validatedData['name'],
                'email' => auth()->check() ? auth()->user()->email : $validatedData['email'],
            ]
        ];

        $tokenService = new CreateSnapTokenService($params);
        $donation->snap_token = $tokenService->getSnapToken();

        if (!is_null($validatedData['comment'])) {
            $campaign->comments()->save($comment);
            $donation->comment()->associate($comment);
        };

        // insert
        $newDonation = $campaign->donations()->save($donation);

        return redirect()->route('payment', [$newDonation]);
    }
}
