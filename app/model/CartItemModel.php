<?php
namespace App\Model;
   
class CartItemModel {

    public $product;
    public $quantity;

    public function __construct($product, $quantity = 1) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getTotal() {
        $total = $this->product->price * $this->quantity;
        return [$total, number_format($total, 2) . '$'];
    }

}