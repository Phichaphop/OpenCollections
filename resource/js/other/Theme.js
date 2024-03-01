function set() {
  if (localStorage.getItem("theme") === "theme-dark") {
    document.getElementById("theme-icon").innerHTML = "nightlight"
  } else {
    document.getElementById("theme-icon").innerHTML = "light_mode"
  }
}

function setTheme(themeName) {
  localStorage.setItem("theme", themeName);
  document.documentElement.className = themeName;
}

function toggleTheme() {
  if (localStorage.getItem("theme") === "theme-dark") {
    document.getElementById("theme-icon").innerHTML = "light_mode"
    setTheme("theme-light");
  } else {
    document.getElementById("theme-icon").innerHTML = "nightlight"
    setTheme("theme-dark");
  }
}

(function () {
  if (localStorage.getItem("theme") === "theme-dark") {
    setTheme("theme-dark");
  } else {
    setTheme("theme-light");
  }
})();