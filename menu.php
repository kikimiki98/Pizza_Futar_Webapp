<?php
session_start();
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
$loggedInUserName = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
require('db/dbconnect.php');

if (isset($_SESSION['user'])) { ?>

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
            <?php

            function addToCart($pizza)
            {
                // Ensure the cart array exists in the session
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                // Add the pizza to the cart
                $_SESSION['cart'][] = $pizza;
            }
            if (!isset($_SESSION['user'])) {
                echo "<div class='table-content'><table>
    <tr>
        <th>Pizza</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Add</th>
    </tr>";

                // Fetch pizza details along with images from the database
                $sqlPizzasWithImages = "SELECT p.pizza_id, p.name, p.price, p.description, i.image_path 
                        FROM pizzas p 
                        LEFT JOIN images i ON p.pizza_id = i.pizza_id";
                $queryPizzasWithImages = $connDB->query($sqlPizzasWithImages);
                $pizzasWithImages = $queryPizzasWithImages->fetchAll(PDO::FETCH_ASSOC);

                // Loop through the result to display them in the table
                foreach ($pizzasWithImages as $pizza) {
                    // Display each row with the image and pizza details
                    echo "<tr>";
                    echo '<td><img class="menu-images" src="' . $pizza['image_path'] . '" alt="' . $pizza['image_path'] . '"></td>';
                    echo "<td>{$pizza['name']}</td>";
                    echo "<td>{$pizza['description']}</td>";
                    echo "<td>\${$pizza['price']}</td>";
                    echo "<td><a href='#' class='add-to-cart' data-img='{$pizza["image_path"]}' data-id='{$pizza['pizza_id']}' data-name='{$pizza['name']}' data-price='{$pizza['price']}'><i class='fa-solid fa-plus'></i></a></td>";
                    echo "</tr>";
                }

                echo "</table></div>";
            } else {
                echo "<div class='table-content'><table>
            <tr>
                <th>Pizza</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>";

                // Fetch pizza details along with images from the database
                $sqlPizzasWithImages = "SELECT p.pizza_id, p.name, p.price, p.description, i.image_path 
                                FROM pizzas p 
                                LEFT JOIN images i ON p.pizza_id = i.pizza_id";
                $queryPizzasWithImages = $connDB->query($sqlPizzasWithImages);
                $pizzasWithImages = $queryPizzasWithImages->fetchAll(PDO::FETCH_ASSOC);

                // Loop through the result to display them in the table
                foreach ($pizzasWithImages as $pizza) {
                    // Display each row with the image and pizza details
                    echo "<tr>";
                    echo '<td><img class="menu-images" src="' . $pizza['image_path'] . '" alt="Pizza Image"></td>';
                    echo "<td>{$pizza['name']}</td>";
                    echo "<td>{$pizza['description']}</td>";
                    echo "<td>\${$pizza['price']}</td>";
                    echo "<td><a href='#' class='add-to-cart' data-id='{$pizza['pizza_id']}' data-name='{$pizza['name']}' data-price='{$pizza['price']}'><i class='fa-solid fa-plus'></i></a></td>";
                    echo "</tr>";
                }

                echo "</table></div>";
            }

            ?>


    </body>

    </html>
<?php } else {
    header('Location: login.php');
}
