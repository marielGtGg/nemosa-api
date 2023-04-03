<?php
namespace Core\Model;

class Table {

    protected $db;

    public function __construct(\Core\Database $db) {
        $this->db = $db;
    }

}