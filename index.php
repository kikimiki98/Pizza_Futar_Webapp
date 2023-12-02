<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    <link rel="stylesheet" href="/style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="overlay">
        <header>
            <nav class="header-navbar">
                <div class="hamburger" onclick="toggleNav()">&#9776;</div>
                <ul class="nav-links" id="navLinks">
                    <a href="#"><i class="fa-solid fa-pizza-slice fa-xl"></i></a>
                    <a href="#">MENU</a>
                    <a href="#">DEALS</a>
                </ul>
            </nav>
            <nav class="header-navbar">
                <ul>
                    <a href="#">ORDER NOW</a>
                    <a href=" #">SIGN IN <i class="fa-solid fa-user"></i></a>
                </ul>
            </nav>

        </header>
        <div class="content">
            <h1>"Serving Slice-perfection,<br> Every Crust Counts!"</h1>
            <button class="btn-menu">See Menu</button>
        </div>
        <div class="homepage_featured">
            <div class="homepage_featured-sectiona">
                <div class="shadow"></div>
                asd
            </div>
            <div class="homepage_featured-sectionb">
                <div class="shadow"></div>
                asd
            </div>
        </div>
        <footer>
            Email: pizza@pizzaproject.com

        </footer>
    </div>
    <script>
        function toggleNav() {
            var navLinks = document.getElementById("navLinks");

            if (window.innerWidth <= 768) {
                if (navLinks.style.display === "none" || navLinks.style.display === "") {
                    navLinks.style.animation = "slideInFromLeft 0.5s ease-in";
                    navLinks.style.display = "flex";
                } else {
                    navLinks.style.animation = "slideOutToLeft 0.5s ease-out";
                    navLinks.addEventListener("animationend", onAnimationEnd);
                }
            } else {
                // If the screen size is larger, always display the navigation links
                navLinks.style.display = "flex";
            }

            function onAnimationEnd() {
                navLinks.removeEventListener("animationend", onAnimationEnd);
                navLinks.style.display = "none";
            }
        }
    </script>
</body>

</html>