function toggleNav() {
    var x = document.getElementById("myNavbarLeft");
    var y = document.getElementById("myNavbarRight");
    if (x.className === "header" && y.className === "header") {
      x.className += " responsive";
      y.className += " responsive";
    } else {
      x.className = "header";
      y.className = "header";
    }
  }