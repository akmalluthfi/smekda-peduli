<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Services\Midtrans\NotificationHandlerService;

class NotificationHandlerController extends Controller
{
    public function index()
    {
        $notificationService = new NotificationHandlerService();

        if (!$notificationService->isSignatureKeyVerified()) return response()->json([
            'error' => true,
            'message' => 'Signature key not verified',
        ], 403);

        $notification = $notificationService->getNotification();
        $donation = $notificationService->getDonation();

        if ($notificationService->isSuccess()) $this->handleSuccess($donation);

        if ($notificationService->isPending()) $this->handlePending($donation);

        if ($notificationService->isFailed()) $this->handleFailed($donation);

        return response()->json([
            'success' => true,
            'message' => 'Notification successfully processed',
        ]);
    }

    private function handleSuccess(Donation $donation)
    {
        $donation->update(['status' => 'success']);
    }

    private function handleFailed($donation)
    {
        $donation->update(['status' => 'failed']);
    }

    private function handlePending($donation)
    {
        $donation->update(['status' => 'pending']);
    }
}
