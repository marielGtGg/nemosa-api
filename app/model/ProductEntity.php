<?php
namespace App\Model;

use Core\Model\Entity;

class ProductEntity extends Entity {

    public function getPrice() {
        return number_format($this->price, 2) . '$';
    }

}