<?php
namespace App\Controller;

use App;

class ProductController {

    private $productStripeModel; 

    public function __construct() {
        $this->productStripeModel = App::getInstance()->getStripeModel('product');
    }

    public function all() {
        return $this->productStripeModel->all(); 
    }

    public function find() {
        return $this->productStripeModel->find($_GET['id']);
    }
    
    public function teaser() {
        return $this->productStripeModel->teaser();
    }

}