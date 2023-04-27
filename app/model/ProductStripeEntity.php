<?php
namespace App\Model;

use Core\Model\StripeEntity;

class ProductStripeEntity extends StripeEntity {

    public $id;
    public $name;
    public $img;
    public $price;
    public $woods;
    public $finish;
    public $measurements;
    public $description;

    public function __construct($stripe, $product) {
        parent::__construct($stripe);
        $this->id = $product->id;
        $this->name = $product->name;
        $this->img = (isset($product->images[0]) ? $product->images[0] : null);
        $this->price = $this->stripe->prices->retrieve($product->default_price)->unit_amount;
        $this->woods = $product->metadata->woods;
        $this->finish = $product->metadata->finish;
        $this->measurements = $product->metadata->measurements;
        $this->description = $product->description;
    }

}