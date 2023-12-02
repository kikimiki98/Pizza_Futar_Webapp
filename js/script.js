
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