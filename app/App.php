<?php

use Core\Config;
use Core\Database;
use Core\StringHandler;

class App {

    private static $_instance;
    private $dbInstance;

    //singleton
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load() {
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
        
        session_start();
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if ($this->dbInstance === null) {
            $this->dbInstance = new Database($config->get('db_name'), $config->get('db_server'), $config->get('db_user'), $config->get('db_password'));
        }
        return $this->dbInstance;
    }

    public function getTable($name) {
        $className = '\\App\\Model\\' . ucfirst($name) . 'Table';
        return new $className($this->getDb());
    }

}