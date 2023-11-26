function toggleSide() {
    var navWidth = document.getElementById("side").style.width;
  
    if (navWidth === "250px") {
      // Close the navigation
      document.getElementById("side").style.width = "0";
    } else {
      // Open the navigation
      document.getElementById("side").style.width = "250px";
    }
  }