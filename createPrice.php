<?php
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51MuMamFg5qjjHaHi3bX7gJGLujdyDzkUl6ZrH845ti7CJ9iWzitVr0WEkvgHTtE4mYb7LI8g6s5AcnpHs1qBeHR800xrKT9iHS");

$product = $stripe->products->create([
  'name' => 'Starter Subscription',
  'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'usd',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

?>
