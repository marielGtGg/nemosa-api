<?php
define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

//unset($_SESSION['cart']);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'product.index';
    $_GET['banner'] = true;
}

$page = explode('.', $page);
$controller = 'App\Controller\\' . ucfirst($page[0]) . 'Controller';
$method = $page[1];

$controller = new $controller();
$controller->$method();

?>    
