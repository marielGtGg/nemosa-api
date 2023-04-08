<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

define('ROOT', __DIR__);

require_once('vendor/autoload.php');
require_once(ROOT . '/app/App.php');
App::load();

$stripe = App::getInstance()->getStripe();

$products = $stripe->products->all();

// $product = $stripe->products->create([
//   'name' => 'Starter Subscription',
//   'description' => '$12/Month subscription',
// ]);
// echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

// $price = $stripe->prices->create([
//   'unit_amount' => 1200,
//   'currency' => 'usd',
//   'recurring' => ['interval' => 'month'],
//   'product' => $product['id'],
// ]);
// echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

// $productTable = App::getInstance()->getTable('product');
// $data = $productTable->all();

// //unset($_SESSION['cart']);

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     $page = '';
// }

// if ($page !== '') {
//     $page = explode('.', $page);
//     $controller = 'App\Controller\\' . ucfirst($page[0]) . 'Controller';
//     $method = $page[1];
    
//     $controller = new $controller();
//     $data = $controller->$method();
    $data = [];
    foreach ($products->data as $product) {
        $newProduct =  [
            'id' => $product->id,
            'name' => $product->name,
            'img' => (isset($product->images[0]) ? $product->images[0] : ''),
            'price' => $stripe->prices->retrieve($product->default_price)->unit_amount
        ];
        $data[] = $newProduct;
    }
    // echo '<pre>';
    echo json_encode($data);
    // echo '</pre>';
// }

return;
?>