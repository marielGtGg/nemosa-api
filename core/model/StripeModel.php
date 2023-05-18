<?php
namespace Core\Model;

class StripeModel {

    protected $stripe;

    public function __construct(\Stripe\StripeClient $stripe) {
        $this->stripe = $stripe;
    }

}