<?php
session_start();
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <?php
    include("topnav/topnav.php");
    ?>
</body>

</html>