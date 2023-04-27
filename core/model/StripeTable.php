<?php
namespace Core\Model;

class StripeTable {

    protected $stripe;

    public function __construct(\Stripe\StripeClient $stripe) {
        $this->stripe = $stripe;
    }

}