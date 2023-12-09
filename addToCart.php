<?php
session_start();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent from the client
    $pizzaImg = $_POST['image'];
    $pizzaId = $_POST['id'];
    $pizzaName = $_POST['name'];
    $pizzaPrice = $_POST['price'];

    // Create or update the cart in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['cart_count'] = 0;
    }

    // Check if the pizza is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $pizzaId) {
            // Increment the quantity if the pizza is already in the cart
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // If the pizza is not in the cart, add it
    if (!$found) {
        $newItem = array(
            'image' => $pizzaImg,
            'id' => $pizzaId,
            'name' => $pizzaName,
            'price' => $pizzaPrice,
            'quantity' => 1  // Initial quantity is 1
        );
        $_SESSION['cart'][] = $newItem;
    }
    $_SESSION['cart_count'] += 1;

    // Send a response back to the client (you can customize this as needed)
    echo json_encode(array('status' => 'success', 'message' => 'Item added to cart'));
} else {
    // If the request is not a POST request, return an error
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}
