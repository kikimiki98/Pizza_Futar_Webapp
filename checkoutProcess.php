<?php
// checkoutProcess.php

// Start or resume the session
session_start();

// Process the order and get order details
$orderDetails = processOrder($_SESSION['cart']);

// Clear the cart and set the count to 0
$_SESSION['cart'] = array();
$_SESSION['cart_count'] = 0;

// Return only the order details (not JSON encoded)
echo $orderDetails;
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
