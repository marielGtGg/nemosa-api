<?php
namespace Core\Model;

class StripeEntity {

    protected $stripe;

    public function __construct(\Stripe\StripeClient $stripe) {
        $this->stripe = $stripe;
    }

}