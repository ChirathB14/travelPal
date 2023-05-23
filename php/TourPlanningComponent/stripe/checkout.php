<?php
session_start();

include "./stripe-php/init.php";
// require '../../DbConfig.php'
//require_once '../vendor/autoload.php';
require_once './secrets.php';
\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/travelPal/php/TourPlanningComponent/stripe/';
// $sql = "SELECT * FROM user_tours WHERE common_id= '$common'";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();
// var_dump($row['final_price']) or die();

$productName = 'Lets Enjoy Your Tour....';
$stripeAmount = $_SESSION['price'];
$email = $_SESSION['email'];
$currency = "lkr";
$url = ["https://travelsurfer.lk/wp-content/uploads/2021/09/travel-world.jpg"];



$checkout_session = \Stripe\Checkout\Session::create(
  [

    'customer_email' => $email,
    'line_items' => [[
      'price_data' => [
        'product_data' => [
          'name' => $_SESSION['name'],
          'images' => $url,
          'description' => $productName,
          // 'metadata' => [
          //   'pro_id' => $productID
          // ]
        ],
        'unit_amount' => $stripeAmount * 100,
        'currency' => $currency,
      ],
      'quantity' => 1,

    ]],

    // 'line_items' => [[
    //   # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    //   'amount' => 500,
    //   'currency' => 'lkr',
    //   // 'price' => '',
    //   // 'unit_amount' => 100,
    //   // 'currency'=> 'lkr',
    //   'quantity' => 1,
    // ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . 'PaymentSuccuess.php',
    'cancel_url' => $YOUR_DOMAIN . 'PaymentFailed.php',
  ]
);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
