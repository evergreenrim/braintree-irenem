<?php

namespace App\Services;

use App\Contracts\Subscribable;
use Braintree\Gateway;

class Braintree implements Subscribable
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = app(Gateway::class);
    }

    public function createCustomer($payload)
    {
        return $this->gateway->customer()->create($payload);
    }

    public function createSubscription($payload)
    {
        return $this->gateway->subscription()->create($payload);
    }
}
