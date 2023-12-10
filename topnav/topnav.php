<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style/styles.css">
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
                    <a href="./checkout.php"><i class="fa badge" style="font-size:24px" value="<?php echo $cartCount ?>">&#xf07a;</i></a>
                    <a href="./register.php">SIGN UP</a>
                    <a href="./login.php">SIGN IN </a>
                    <?php if (!empty($loggedInUserName)) : ?>
                        <a href="./profil.php"><?php echo $loggedInUserName; ?> <i class="fa-solid fa-user"></i></a>
                        <a href="./index.php?logout">Logout</a>
                    <?php else : ?>
                        <a href="./profil.php"><i class="fa-solid fa-user"> </i></a>
                    <?php endif; ?>
                </ul>
            </nav>

        </header>
        <script src="./js/script.js"></script>
</body>

</html>