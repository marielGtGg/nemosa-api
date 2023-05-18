<?php
namespace App\Model;
   
use Core\Model\StripeModel;
class CartStripeModel extends StripeModel {

    // public $items;

    public function __construct($stripe) {
        parent::__construct($stripe);
        // if (isset($_SESSION['cart'])) {
        //     $this->items = $_SESSION['cart'];
        // } else {
        //     $this->items = [];
        // }
    }

    public function checkout($params) {
        $checkoutSession = $this->stripe->checkout->sessions->create([
            'success_url' => $params['success_url'],
            'cancel_url' => $params['cancel_url'],
            'line_items' => [
              [
                'price' => 'price_1MuMzaFg5qjjHaHiE2kU6Sqy',
                'quantity' => 2,
              ],
            ],
            'mode' => 'payment',
        ]);
        return ['checkout_url' => $checkoutSession->url];
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
