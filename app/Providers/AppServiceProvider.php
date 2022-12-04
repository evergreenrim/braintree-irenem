<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Gateway::class, function ($app) {
            $gateway = new Gateway([
                'environment' => config('braintree.environment'),
                'merchantId' => config('braintree.merchant_id'),
                'publicKey' => config('braintree.public_key'),
                'privateKey' => config('braintree.private_key'),
            ]);

            return $gateway;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
