<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

$productTable = App::getInstance()->getTable('product');
$data = $productTable->all();
//var_dump($data);

// //unset($_SESSION['cart']);

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     $page = 'product.index';
//     $_GET['banner'] = true;
// }

// $page = explode('.', $page);
// $controller = 'App\Controller\\' . ucfirst($page[0]) . 'Controller';
// $method = $page[1];

// $controller = new $controller();
// $controller->$method();

echo json_encode($data);
return;
?>