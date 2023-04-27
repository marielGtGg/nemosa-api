<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

define('ROOT', __DIR__);

require_once('vendor/autoload.php');
require_once(ROOT . '/app/App.php');
App::load();

//unset($_SESSION['cart']);

$query = (isset($_GET['q']) ? $_GET['q'] : '');

if ($query !== '') {
    $query = explode('.', $query);
    $controller = 'App\Controller\\' . ucfirst($query[0]) . 'Controller';
    $method = $query[1];
    
    $controller = new $controller();
    $data = $controller->$method();

    echo json_encode($data);
}

return;
?>
