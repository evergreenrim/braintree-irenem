<?php

namespace Tests\Stubs;

class Customer
{
    public $id = '591758620';

    public $merchantId = 'rypzdxhmv47ytjgw';

    public $firstName = 'Jane';

    public $lastName = 'Doe';

    public $globalId = 'Y3VzdG9tZXJfNTkxNzU4NjIw';

    public $creditCards = 'Y3VzdG9tZXJfNTkxNzU4NjIw';

    public function __construct()
    {
        $this->creditCards = [new CreditCard([
            'token' => 'etpsxazg',
            'bin' => '401288',
            'expirationMonth' => '12',
            'expirationYear' => '2023',
            'last4' => '1881',
            'cardType' => 'Visa',
            'customerId' => '591758620',
            'subscriptions' => [],
        ])];
    }

    public function create($payload)
    {
        return new Successful([
            'success' => true,
            'customer' => $this,
        ]);
    }
}
