<?php
session_start();
require('db/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- <link rel="stylesheet" href="style/styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="overlay">
        <header>
            <nav class="header-navbar">
                <div class="hamburger" onclick="toggleNav()">&#9776;</div>
                <ul class="nav-links" id="navLinks">
                    <a href="index.php"><i class="fa-solid fa-pizza-slice fa-xl"></i></a>
                    <a href="menu.php">MENU</a>
                    <a href="index.php#deals">DEALS</a>
                </ul>
            </nav>
            <nav class="header-navbar">
                <ul>
                    <a href="#">ORDER NOW</a>
                    <a href=" #">SIGN IN <i class="fa-solid fa-user"></i></a>
                </ul>
            </nav>

        </header>
        <?php
        // Assuming your images are in the /images directory
        $imageDirectory = 'PIZZA_FUTAR_WEBAPP/images/';

        // Get a list of all image files in the directory
        $imageFiles = glob($imageDirectory . 'menu*.jpg');

        // Loop through the image files and display them
        foreach ($imageFiles as $imageFile) {
            // Display each image with a simple HTML img tag
            echo '<img src="' . $imageFile . '" alt="Pizza Image"><br>';
        }
        ?>
        <script src="script.js"></script>
</body>

</html>