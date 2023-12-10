<?php
// checkoutProcess.php

// Start or resume the session
session_start();
require('db/dbconnect.php');
// Process the order and get order details
$orderDetails = processOrder($_SESSION['cart']);

// Process the order and get order details
$orderDetails = processOrder($_SESSION['cart']);
$userDetails = $_SESSION['user']['user_id'];

// Save order details to the database
saveOrderToDatabase($orderDetails, $userDetails, $connDB);

// Clear the cart and set the count to 0
$_SESSION['cart'] = array();
$_SESSION['cart_count'] = 0;

// Return the order details as a response
echo json_encode(array('status' => 'success', 'orderDetails' => $orderDetails));
exit;

function processOrder($cart)
{
    // Customize this function to process the order
    // For example, you can create an order summary with pizza names

    $orderSummary = "Order Details:\n";
    $totalPrice = 0;
    foreach ($cart as $item) {
        $orderSummary .= "Pizza Name: {$item['name']}\n";
        // You can include additional details like quantity, price, etc.
        $orderSummary .= "Quantity: {$item['quantity']}\n";
        $price = $item['price'] * $item['quantity'];
        $orderSummary .= "Price: $" . $price . "\n";
        $orderSummary .= "\n";
        $totalPrice += $price;
    }
    $orderSummary .= "Total Price: $" . $totalPrice . "";
    return $orderSummary;
}

function saveOrderToDatabase($orderDetails, $userDetails, $conn)
{
    global $connDB;
    // Assuming you have a table named 'orders' with columns 'order_details' and 'order_date'
    $insertQuery = "INSERT INTO orders (customer_id, order_details, order_date) VALUES (:customer_id, :orderDetails, NOW())";

    // Assuming $_SESSION['user']['user_id'] contains the user ID (customer_id)
    $customer_id = $_SESSION['user']['user_id'];

    // Use prepared statements to avoid SQL injection
    $stmt = $connDB->prepare($insertQuery);
    $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
    $stmt->bindParam(':orderDetails', $orderDetails, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();
}
