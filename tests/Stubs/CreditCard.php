<?php

namespace Tests\Stubs;

class CreditCard
{
    public $token = 'etpsxazg';

    public function __construct(
        public array $attributes
    ) {
    }
}
