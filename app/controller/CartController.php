<?php
namespace App\Controller;

use App;
use App\Model\CartStripeModel;
use App\Model\CartItemModel;

class CartController {

    private $cartStripeModel;
    private $productStripeModel;

    public function __construct() {
        $this->productStripeModel = App::getInstance()->getStripeModel('product');
        $this->cartStripeModel = App::getInstance()->getStripeModel('cart');
    }

    public function checkout($post) {
        return $this->cartStripeModel->checkout($post);
    }

}


