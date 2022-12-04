<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\Braintree;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\Mocks\MocksBraintree;
use Tests\TestCase;

class BraintreeTest extends TestCase
{
    use MocksBraintree, RefreshDatabase;

    const NONCE_FROM_FRONTEND = 'fake-valid-visa-nonce';

    public function test_it_can_create_a_customer()
    {
        $this->setupMockHandler();

        $payload = [
            'paymentMethodNonce' => self::NONCE_FROM_FRONTEND,
            'firstName' => uniqid('Jane_'),
            'lastName' => 'Doe',
            'creditCard' => [
                'options' => [
                    'verifyCard' => true,
                ],
            ],
        ];

        $gateway = (new Braintree)->createCustomer($payload);

        $this->assertTrue($gateway->success, 'Customer has been created');
        $this->assertNotNull($gateway->customer);
    }

    public function test_a_registered_customer_can_subscribe()
    {
        $this->setupMockHandler();

        // say a registered customer in the db subscribe on a plan in braintree
        $user = User::factory()->create();

        $this->assertTrue($user->subscription()->doesntExist());

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/payment', [
            'planId' => 2,
            'paymentMethodNonce' => self::NONCE_FROM_FRONTEND,
            'firstName' => uniqid('Gina_'),
            'lastName' => 'Jones',
            'creditCard' => [
                'options' => [
                    'verifyCard' => true,
                ],
            ],
        ]);

        $this->assertTrue($user->subscription()->exists());
        $response->assertSuccessful();
    }
}
