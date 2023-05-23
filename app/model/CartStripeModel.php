<?php
namespace App\Model;
   
use Core\Model\StripeModel;
class CartStripeModel extends StripeModel {

    public function __construct($stripe) {
        parent::__construct($stripe);
    }

    public function checkout($params) {
        $line_items = [];

        foreach ($params['items'] as $item) {
            $line_items[] = [
                'price' => $item['price_id'],
                'quantity' => $item['quantity'],
            ];
        }

        $checkoutSession = $this->stripe->checkout->sessions->create([
            'success_url' => $params['success_url'],
            'cancel_url' => $params['cancel_url'],
            'line_items' => $line_items,
            'mode' => 'payment',
        ]);

        return ['checkout_url' => $checkoutSession->url];
    }

}
