<?php
namespace App\Model;

use Core\Model\Table;

class ProductTable extends Table {

    public function all() {
        return $this->db->query('select * from product', str_replace('Table', 'Entity', __CLASS__));
    }

    public function find($id) {
        return $this->db->prepare('select * from product where id = :id', [$id], str_replace('Table', 'Entity', __CLASS__), true);   
    }

}