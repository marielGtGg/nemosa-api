<?php
namespace App\Controller;

use App;

class ProductController {

    private $productStripeTable; 

    public function __construct() {
        $this->productStripeTable = App::getInstance()->getStripeTable('product');
    }

    // public function render($view, $variables = []) {
    //     ob_start();
    //     extract($variables);
    //     require $view;
    //     $content = ob_get_clean();    
    //     require ROOT . '/app/view/template/default.php';    
    // }
    
    // public function index() {
    //     $products = $this->productTable->all(); 
    //     $this->render(ROOT . '/app/view/product.index.php', compact('products'));       
    // }

    // public function single() {
    //     $product = $this->productTable->find($_GET['id']);
    //     $this->render(ROOT . '/app/view/product.single.php', compact('product'));
    // }

    public function all() {
        return $this->productStripeTable->products; 
    }

    public function find() {
        return $this->productStripeTable->find($_GET['id']);
    }
    
    public function teaser() {
        return $this->productStripeTable->teaser();
    }

}