<?php
namespace App\Controller;

use App;

class ProductController {

    private $productTable;

    public function __construct() {
        $this->productTable = App::getInstance()->getTable('product');
    }

    public function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require $view;
        $content = ob_get_clean();    
        require ROOT . '/app/view/template/default.php';    
    }
    
    public function index() {
        $products = $this->productTable->all(); 
        $this->render(ROOT . '/app/view/product.index.php', compact('products'));       
    }

    public function single() {
        $product = $this->productTable->find($_GET['id']);
        $this->render(ROOT . '/app/view/product.single.php', compact('product'));
    }

}