
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

  const elements = document.getElementsByClassName('parallax-link');

  // Loop through each element and attach the event listener
  for (const element of elements) {
      element.addEventListener('click', function (e) {
          e.preventDefault();
  
          const targetId = this.getAttribute('href').substring(1);
          const targetElement = document.getElementById(targetId);
  
          if (targetElement) {
              window.scrollTo({
                  top: targetElement.offsetTop,
                  behavior: 'smooth'
              });
          }
      });
  }



