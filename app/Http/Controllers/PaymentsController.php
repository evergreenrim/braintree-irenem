<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Services\Braintree;

class PaymentsController extends Controller
{
    public function store(PaymentStoreRequest $request)
    {
        $user = $request->user();

        $payload = $request->toArray();
        $planId = $payload['planId'];

        unset($payload['planId']);

        $customerResponse = (new Braintree)->createCustomer($payload);

        if ($customerResponse->success) {
            $subscriptionRequest = (new Braintree)->createSubscription([
                'paymentMethodToken' => $customerResponse->customer->creditCards[0]->token,
                'planId' => $planId,
            ]);

            if ($subscriptionRequest->success) {
                $user->subscription()
                    ->create([
                        'plan_id' => $planId,
                        'subscription_reference_id' => $subscriptionRequest->subscription->id,
                    ]);

                return response()->json(['message' => 'Subscription successful.'], 201);
            }
        }

        return response()->json(['message' => 'Something went wrong. Please try again.'], 500);
    }
}
