<?php

namespace Tests\Mocks;

use Braintree\Gateway;
use Tests\Stubs\Gateway as StubsGateway;

trait MocksBraintree
{
    public function setupMockHandler()
    {
        app()->bind(Gateway::class, function ($app) {
            $gateway = new StubsGateway();

            return $gateway;
        });
    }
}
