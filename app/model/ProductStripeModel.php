<?php
namespace App\Model;

use Core\Model\StripeModel;
use App;
use App\Model\ProductEntity;

class ProductStripeModel extends StripeModel {

    public function __construct($stripe) {
        parent::__construct($stripe);
    }
    
    private function getProductInstances($datas) {
        if (gettype($datas) === 'array') {
            $products = [];
            foreach ($datas as $product) {
                $products[] = App::getInstance()->getStripeEntity('product', $product);
            }
            return $products;
        }
        return App::getInstance()->getStripeEntity('product', $datas);
    }

    public function all() {
        return $this->getProductInstances($this->stripe->products->all(['active' => true])->data);
    }

    public function find($id) {
        return $this->getProductInstances($this->stripe->products->retrieve($id, []));
    }
        
    public function teaser() {
        $products = [];

        $products['teaser1'] = $this->getProductInstances($this->stripe->products->search([
            'query' => 'active:\'true\' AND metadata[\'teaser1\']:\'true\'',
            'limit' => 1
        ])->data[0]);

        $products['teaser2'] = $this->getProductInstances($this->stripe->products->search([
            'query' => 'active:\'true\' AND metadata[\'teaser2\']:\'true\'',
            'limit' => 1
        ])->data[0]);

        $products['teaser3'] = $this->getProductInstances($this->stripe->products->search([
            'query' => 'active:\'true\' AND metadata[\'teaser3\']:\'true\'',
            'limit' => 1
        ])->data[0]);

        return $products;
    }

}