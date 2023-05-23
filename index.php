<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

define('ROOT', __DIR__);

require_once('vendor/autoload.php');
require_once(ROOT . '/app/App.php');
App::load();

if (isset($_POST)) {
    $post = json_decode(file_get_contents('php://input'), true);
}

$query = (isset($_GET['q']) ? $_GET['q'] : '');

if ($query !== '') {
    $query = explode('.', $query);
    $controller = 'App\Controller\\' . ucfirst($query[0]) . 'Controller';
    $method = $query[1];
    
    $controller = new $controller();
    $data = $controller->$method(isset($post) ? $post : null);

    echo json_encode($data);
}

return;
?>
