function set() {
  const currentHour = new Date().getHours();
  const themeElement = document.getElementById("theme-icon");
  const theme = localStorage.getItem("theme");

  if (currentHour === 8 || theme === "theme-light") {
      document.documentElement.setAttribute("data-theme", "light");
      themeElement.innerHTML = "light_mode";
      localStorage.setItem("theme", "theme-light");
  } else if (currentHour === 18 || theme === "theme-dark") {
      document.documentElement.setAttribute("data-theme", "dark");
      themeElement.innerHTML = "nightlight";
      localStorage.setItem("theme", "theme-dark");
  } else {
      // If no specific time, use stored theme or default to light
      const defaultTheme = theme || "theme-light";
      document.documentElement.setAttribute("data-theme", defaultTheme === "theme-light" ? "light" : "dark");
      themeElement.innerHTML = defaultTheme === "theme-light" ? "light_mode" : "nightlight";
  }

  // Check if 'lang' cookie exists
  const langCookie = document.cookie.split('; ').find(row => row.startsWith('lang='));
  if (langCookie) {
      const lang = langCookie.split('=')[1];
      const langElement = document.getElementById("lang");

      switch(lang) {
          case "en":
              langElement.innerHTML = "language_us";
              break;
          case "th":
              langElement.innerHTML = "translate";
              break;
          default:
              langElement.innerHTML = "translate";
              break;
      }
  } else {
      // Default language setting if cookie does not exist
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