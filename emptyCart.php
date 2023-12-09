<?php
// emptyCart.php

// Start or resume the session
session_start();

// Clear the cart and set the count to 0
$_SESSION['cart'] = array();
$_SESSION['cart_count'] = 0;

header('location: checkout.php');

echo json_encode(array('status' => 'success', 'message' => 'Cart emptied'));
