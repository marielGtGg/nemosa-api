<?php
namespace App\Model;

use Core\Model\StripeModel;

class ProductStripeEntity extends StripeModel {

    public $id;
    public $name;
    public $img;
    public $price;
    public $description;
    public $woods;
    public $finish;
    public $measurements;
    public $teaser1;
    public $teaser2;
    public $teaser3;

    public function __construct($stripe, $product) {
        parent::__construct($stripe);

        $price = $this->stripe->prices->retrieve($product->default_price);

        $this->id = $product->id;
        $this->name = $product->name;
        $this->img = (isset($product->images[0]) ? $product->images[0] : null);
        $this->price_id = $price->id;
        $this->price = $price->unit_amount;
        $this->description = $product->description;
        $this->woods = $product->metadata->woods;
        $this->finish = $product->metadata->finish;
        $this->measurements = $product->metadata->measurements;
        $this->teaser1 = $product->metadata->teaser1;
        $this->teaser2 = $product->metadata->teaser2;
        $this->teaser3 = $product->metadata->teaser3;
    }

}