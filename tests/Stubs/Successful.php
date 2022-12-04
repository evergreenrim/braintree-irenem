<?php

namespace Tests\Stubs;

class Successful
{
    /**
     * @var bool always true
     */
    public bool $success = true;

    public $customer;

    public $subscription;

    public function __construct(
        public array $attributes
    ) {
        $this->customer = (isset($this->attributes['customer'])) ? $this->attributes['customer'] : null;
        $this->subscription = (isset($this->attributes['subscription'])) ? $this->attributes['subscription'] : null;
    }
}
