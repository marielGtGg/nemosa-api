<?php
namespace App\Model;
   
class CartStripeModel {

    public $items;

    public function __construct() {
        if (isset($_SESSION['cart'])) {
            $this->items = $_SESSION['cart'];
        } else {
            $this->items = [];
        }
    }

    public function __destruct() {
        $_SESSION['cart'] = $this->items;
    }

    // public function addItem($item) {
    //     $id = $item->product->id;
    //     if (in_array($id, array_keys($this->items))) {
    //         $this->items[$id]->quantity += $item->quantity;
    //     } else {
    //         $this->items[$id] = $item;
    //     }
    // }

    // public function deleteItem($itemId) {
    //     unset($this->items[$itemId]);
    // }

    // public function emptyCart() {
    //     $this->items = [];
    // }

    // public function getNbItemsTotal() {
    //     $nbItemsTotal = 0;
    //     foreach ($this->items as $item) {
    //         $nbItemsTotal += $item->quantity;
    //     }
    //     return $nbItemsTotal;
    // }

    // public function getPriceTotal() {
    //     $priceTotal = 0;
    //     foreach ($this->items as $item) {
    //         $priceTotal += $item->getTotal()[0];
    //     }
    //     return [$priceTotal, number_format($priceTotal, 2) . '$'];
    // }
}
