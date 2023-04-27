<?php
namespace App\Model;

use Core\Model\StripeTable;
use App;
use App\Model\ProductEntity;

class ProductStripeTable extends StripeTable {

    private function getProductInstances($datas) {
        $products = [];
        foreach ($datas as $product) {
            $products[] = App::getInstance()->getStripeEntity('product', $product);
        }
        return $products;
    }
    
    public function all() {
        return $this->getProductInstances($this->stripe->products->all(['active' => true])->data);
    }

    // public function find($id) {
    //     return $this->db->prepare('select * from product where id = :id', [$id], str_replace('Table', 'Entity', __CLASS__), true);   
    // }

}