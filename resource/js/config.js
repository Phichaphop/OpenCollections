  function set() {
    const currentHour = new Date().getHours();
    const themeElement = document.getElementById("theme");
    
    if (currentHour === 8 || localStorage.getItem("theme") === "theme-light") {
        document.documentElement.setAttribute("data-theme", "light");
        themeElement.innerHTML = "light_mode";
        localStorage.setItem("theme", "theme-light");
    } else if (currentHour === 18 || localStorage.getItem("theme") === "theme-dark") {
        document.documentElement.setAttribute("data-theme", "dark");
        themeElement.innerHTML = "nightlight";
        localStorage.setItem("theme", "theme-dark");
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