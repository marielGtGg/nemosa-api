<?php
namespace Core;
use \PDO;

class Database {

    private $db_name;
    private $db_server;
    private $db_user;
    private $db_password;
    private $pdo;

    public function __construct($db_name, $db_server = 'localhost', $db_user = '', $db_password = '') {
        $this->db_name      = $db_name;
        $this->db_server    = $db_server;
        $this->db_user      = $db_user;
        $this->db_password  = $db_password;
    }
    
    private function getPDO() {
        if ($this->pdo === null) {
            $this->pdo = new PDO('sqlsrv:Server=' . $this->db_server .';Database=' . $this->db_name, $this->db_user, $this->db_password);     
        }
        return $this->pdo;
    }

    public function query($sql, $class) {
        $datas = $this->getPDO()->query($sql)->fetchAll(PDO::FETCH_CLASS, $class);
        return $datas;
    }

    public function prepare($sql, $params, $class, $one = false) {
        $query = $this->getPDO()->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS, $class);
        if ($one) {
            $datas = $query->fetch();
        } else {
            $datas = $query->fetchAll();
        }
        return $datas;
    }

}
