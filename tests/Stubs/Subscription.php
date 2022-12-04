<?php

namespace Tests\Stubs;

class Subscription
{
    public bool $success = true;

    public $id = 'km5h46';

    public function create($payload)
    {
        return new Successful([
            'success' => true,
            'subscription' => $this,
        ]);
    }
}
