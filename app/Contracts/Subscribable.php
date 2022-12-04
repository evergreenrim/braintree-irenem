<?php

namespace App\Contracts;

interface Subscribable
{
    /**
     * Create subscription
     *
     * @param array payload
     */
    public function createSubscription($payload);

    /**
     * Create a customer
     *
     * @param array payload
     */
    public function createCustomer($payload);
}
