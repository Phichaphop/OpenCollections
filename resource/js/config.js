function set() {
    if (localStorage.getItem("theme") === "theme-dark") {
      document.getElementById("theme-icon").innerHTML = "nightlight"
    } else {
      document.getElementById("theme-icon").innerHTML = "light_mode"
    }
  
    var lang = document.cookie.split('; ').find(row => row.startsWith('lang=')).split('=')[1];
    if (lang === "en") {
      document.getElementById("lang").innerHTML = "language_us";
    } else {
      document.getElementById("lang").innerHTML = "translate";
    }
  }

  function getCookie(name) {
    var value = `; ${document.cookie}`;
    var parts = value.split(';');
    for (var i = 0; i < parts.length; i++) {
      var part = parts[i].trim();
      if (part.startsWith(name + '=')) {
        return part.substring(name.length + 1);
      }
    }
    return null;
  }

const lang = getCookie("lang");