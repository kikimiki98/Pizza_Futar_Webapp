
function toggleNav() {
    var navLinks = document.getElementById("navLinks");
    var screenWidth = window.innerWidth;
  
    if (screenWidth <= 768) {
      // Toggle the display property for smaller screens
      navLinks.style.display = navLinks.style.display === "none" ? "inline-flex" : "none";
    } else {
      // Always display the navigation links for larger screens
      navLinks.style.display = "inline-flex";
    }
  }
  
  // Add an event listener for window resize
  window.addEventListener("resize", function () {
    // Call toggleNav on window resize
    toggleNav();
  });

 document.querySelectorAll('a').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        window.scrollTo({
          top: targetElement.offsetTop,
          behavior: 'smooth'
        });
      });
    });