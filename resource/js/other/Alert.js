function Alert() {
  var AutoTimer = 5000;
  setTimeout(AutoCloseAlert, AutoTimer);
}

function AutoCloseAlert() {
  var Alert = document.getElementById("Alert");
  Alert.style.display = "none";
  clearTimeout(AutoTimer);
}

function CloseAlert() {
  var Alert = document.getElementById("Alert");
  Alert.style.display = "none";
}
