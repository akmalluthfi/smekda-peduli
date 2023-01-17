<?php

namespace App\Services\Midtrans;

use App\Models\Donation;
use App\Services\Midtrans\Midtrans;
use Midtrans\Notification;

class NotificationHandlerService extends Midtrans
{
    private $notification;
    private $donation;

    public function __construct()
    {
        parent::__construct();

        $this->handleNotification();
    }

    private function handleNotification()
    {
        $notif = new Notification();

        $order_id = $notif->order_id;

        $this->donation =  Donation::find($order_id);
        $this->notification = $notif;
    }

    private function createLocalSignatureKey()
    {
        $orderID = $this->donation->id;
        $statusCode = $this->notification->status_code;
        $grossAmount =  number_format((float)$this->donation->amount, 2, '.', '');
        $serverKey = $this->serverKey;

        $input = $orderID . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    public function isSignatureKeyVerified()
    {
        return $this->createLocalSignatureKey() === $this->notification->signature_key;
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getDonation()
    {
        return $this->donation;
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isPending()
    {
        return ($this->notification->transaction_status == 'pending');
    }

    public function isFailed()
    {
        return ($this->notification->transaction_status == 'deny' ||
            $this->notification->transaction_status == 'expire' ||
            $this->notification->transaction_status == 'cancel');
    }
}
