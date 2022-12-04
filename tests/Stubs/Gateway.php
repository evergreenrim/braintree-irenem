<?php

namespace Tests\Stubs;

class Gateway
{
    public function customer()
    {
        return new Customer;
    }

    public function subscription()
    {
        return new Subscription;
    }
}
