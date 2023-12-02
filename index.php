<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="overlay">
        <header id="top">
            <nav class="header-navbar">
                <div class="hamburger" onclick="toggleNav()">&#9776;</div>
                <ul class="nav-links" id="navLinks">
                    <a href="#"><i class="fa-solid fa-pizza-slice fa-xl"></i></a>
                    <a href="#deals" class='parallax-link'>DEALS</a>
                    <a href="menu.php">MENU</a>
                </ul>
            </nav>

            <h1 class="title">SliceFiesta</h1>

            <nav class="header-navbar">
                <ul>
                    <a href="#">ORDER NOW</a>
                    <a href=" #">SIGN IN <i class="fa-solid fa-user"></i></a>
                </ul>
            </nav>

        </header>
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
                    <button class=" btn-featured">Order Now!</button>
                </div>
                <div class="homepage_featured-sectionb">
                    <div class="featured_paragraph">
                        <h3><span class="new">NEW</span> Last Minute Pizza</h3>
                        <p>Are you in a rush? 8 Minutes is and its in your hands!</p>

                    </div>
                    <button class=" btn-featured">Order Now!</button>
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