<?php
namespace App\Model;

use Core\Model\StripeTable;

class ProductStripeTable extends StripeTable {

    public function all() {
        $products = $this->stripe->products->all(['active' => true]);
        $data = [];
        foreach ($products->data as $product) {
            $newProduct =  [
                'id' => $product->id,
                'name' => $product->name,
                'img' => (isset($product->images[0]) ? $product->images[0] : null),
                'price' => $this->stripe->prices->retrieve($product->default_price)->unit_amount,
                'woods' => $product->metadata->woods,
                'finish' => $product->metadata->finish,
                'measurements' => $product->metadata->measurements,
                'description' => $product->description,
            ];
            $data[] = $newProduct;
        }
        return $data;
    }

    // public function find($id) {
    //     return $this->db->prepare('select * from product where id = :id', [$id], str_replace('Table', 'Entity', __CLASS__), true);   
    // }

}