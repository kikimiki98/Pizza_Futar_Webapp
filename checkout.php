<?php
session_start();
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
$loggedInUserName = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
require('db/dbconnect.php');
if (isset($_SESSION['user'])) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <link rel="stylesheet" href="style/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/addToCart.js"></script>
    </head>

    <body>

        <div class="overlay">
            <?php
            include("topnav/topnav.php");
            ?>

            <body>
                <?php
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    $totalPrice = 0;
                    // Output the HTML for each cart item
                    foreach ($_SESSION['cart'] as $item) {
                        $price = $item['price'];
                        echo '<img class="menu-images" src="' . $item['image'] . '" alt="' . $item['image'] . '">';
                        echo "<p>Item ID: {$item['id']}</p>";
                        echo "<p>Item Name: {$item['name']}</p>";
                        echo "<p>Item Price: {$item['price']}</p>";
                        echo "<p>Quantity: {$item['quantity']}</p>";
                        echo "<hr>";
                        $totalPrice += $price;
                    }

                    // Display the total number of items in the cart
                    echo "<p>Total Items in Cart: {$_SESSION['cart_count']}</p>";
                    echo "<p>Total: $" . $totalPrice . "</p>";
                    echo "<button id='delete' onclick='emptyCart()'> Empty cart </button>";
                    echo "<button id='checkout' onclick='checkout()'> Checkout </button>";
                } else {
                    // Display a message if the cart is empty
                    echo "<p>Your cart is empty.</p>";
                }
                ?>
            </body>

    </html>
<?php else : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <link rel="stylesheet" href="style/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/addToCart.js"></script>
    </head>

    <body>

        <div class="overlay">
            <?php
            include("topnav/topnav.php");
            ?>

            <body>
                You need to be logged in! <a href="./register.php">SIGN IN <i class="fa-solid fa-user"></i></a>
            </body>

    </html>
<?php endif; ?>