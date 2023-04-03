<?php
namespace Core;

class Autoloader {

    static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class) {
        require ROOT . '\\' . $class . '.php';
    }
}