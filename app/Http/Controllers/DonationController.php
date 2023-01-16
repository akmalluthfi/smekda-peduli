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
        return view('donations.index', [
            'campaign' => $campaign
        ]);
    }

    public function store(StoreDonationRequest $request, Campaign $campaign)
    {
        $validatedData = $request->validated();

        $donation = new Donation([
            'status' => 'pending',
            'amount' => $validatedData['amount']
        ]);

        $donationID = $donation->newUniqueId();
        $donation->id = $donationID;

        $comment = new Comment([
            'status' => 'pending',
            'body' => $validatedData['comment'],
            'as_anonymous' => $request->has('as_anonymous'),
        ]);

        if (auth()->check()) {
            $donation->user_id = auth()->user()->id;
            $comment->user_id = auth()->user()->id;
        } else {
            $donation->name = $validatedData['name'];
            $donation->email = $validatedData['email'];

            $comment->name = $validatedData['name'];
            $comment->email = $validatedData['email'];
        }


        // generate snap token 
        $params = [
            'transaction_details' => [
                'order_id' => $donationID,
                'gross_amount' => $validatedData['amount'],
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => '150000',
                    'quantity' => 1,
                    'name' => 'Flashdisk Toshiba 32GB',
                ],
            ],
            'customer_details' => [
                'first_name' => auth()->check() ? auth()->user()->id : $validatedData['name'],
                'email' => auth()->check() ? auth()->user()->email : $validatedData['email'],
            ]
        ];

        $tokenService = new CreateSnapTokenService($params);
        $donation->snap_token = $tokenService->getSnapToken();

        // insert
        $newDonation = $campaign->donations()->save($donation);

        if (!is_null($validatedData['comment'])) {
            $campaign->comments()->save($comment);
        };

        return redirect()->route('payment', [$newDonation]);
    }
}
