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

    public function checkout() {
        return $this->cartStripeModel->checkout();
    }

    // protected function render($view, $variables = []) {
    //     ob_start();
    //     extract($variables);
    //     require $view;
    //     $content = ob_get_clean();    
    //     require ROOT . '/app/view/template/default.php';    
    // }

    // protected function header($page) {
    //     $location = 'location: index.php?page=' . $page;
    //     header($location);
    // }

    // public function index() {
    //     $cart = $this->cart;
    //     $this->render(ROOT . '/app/view/cart.index.php', compact('cart'));       
    // }

    // public function checkout() {
    //     $this->render(ROOT . '/app/view/cart.checkout.php');
    // }
    
    // private function add() {
    //     if (isset($_POST['id'])) {
    //         $product = $this->productTable->find($_POST['id']);
    //         $quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : 1);
    //         $item = new CartItemModel($product, $quantity);  
    //         $this->cart->addItem($item);
    //     }
    // }

    // public function addFromIndex() {
    //     $this->add();
    //     $this->header('product.index');
    // }

    // public function addFromSingle() {
    //     $id = (isset($_POST['id']) ? $_POST['id'] : null);
    //     $this->add();
    //     $this->header('product.single&id=' . $id);
    // }

    // public function increaseQty() {
    //     $this->add();
    //     $this->header('cart.index');
    // }

    // public function deleteItem() {
    //     if (isset($_POST['id'])) {
    //         $this->cart->deleteItem($_POST['id']);
    //         $this->header('cart.index');
    //     }
    // }

    // public function emptyCart() {
    //     $this->cart->emptyCart();
    //     $this->header('cart.index');
    // }

}


