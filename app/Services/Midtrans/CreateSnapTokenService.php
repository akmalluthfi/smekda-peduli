<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $params;

    public function __construct($params = null)
    {
        parent::__construct();

        $this->params = $params;
    }

    public function getSnapToken()
    {
        if (is_null($this->params)) return false;

        $snapToken = Snap::getSnapToken($this->params);

        return $snapToken;
    }
}
