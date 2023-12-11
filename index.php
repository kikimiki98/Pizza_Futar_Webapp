<?php
session_start();
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
$loggedInUserName = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';

if (isset($_GET['logout'])) {
    session_destroy();

    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="overlay">
        <?php
        $user= null;
        if (isset($_SESSION['user']['username'])){
            $user = $_SESSION['user']['username'];
        }
        
        if ($user==="admin") {
            require("./topnav/topnav_logged_in_admin.php");
        } elseif (isset($user)) {
            require("./topnav/topnav_logged_in.php");
        }else {
            require("./topnav/topnav.php");
        }
        ?>
        <section id="home">
            <div class="content">
                <h1>"Serving Slice-perfection,<br> Every Crust Counts!"</h1>
                <a href="menu.php"><button class="btn-menu">See Menu</button></a>
            </div>
        </section>
        <section id="deals">
            <div class="homepage_featured">
                <div class="homepage_featured-sectiona">
                    <div class="featured_paragraph">
                        <h3><span class="new">NEW</span> Mama's Pizza</h3>
                        <p>Try our new home-style Pizza!</p>
                    </div>
                    <a href="menu.php"><button class="btn-menu">Order Now!</button></a>
                </div>
                <div class="homepage_featured-sectionb">
                    <div class="featured_paragraph">
                        <h3><span class="new">NEW</span> Last Minute Pizza</h3>
                        <p>Are you in a rush? 8 Minutes is and its in your hands!</p>

                    </div>
                    <a href="menu.php"><button class="btn-menu">Order Now!</button></a>
                    <a href="#top" class='parallax-link'>
                        <div class="up"><i class="fa-solid fa-arrow-up"></i></div>
                    </a>
                </div>

            </div>
        </section>
        <footer>
            Email: pizza@pizzaproject.com

        </footer>
    </div>
    <script src="js/script.js"></script>
</body>

</html>