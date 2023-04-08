<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

define('ROOT', __DIR__);

require_once('vendor/autoload.php');
require_once(ROOT . '/app/App.php');
App::load();

// $productTable = App::getInstance()->getTable('product');
// $data = $productTable->all();

// //unset($_SESSION['cart']);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}

if ($page !== '') {
    $page = explode('.', $page);
    $controller = 'App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $method = $page[1];
    
    $controller = new $controller();
    $data = $controller->$method();
    
    echo json_encode($data);
}

return;
?>