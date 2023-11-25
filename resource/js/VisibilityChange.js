function VisibilityPassChange() {
  var VisibilityPass = document.getElementById("VisibilityPass");
  var Pass = document.getElementById("Pass");
  if (VisibilityPass.textContent == "visibility_off") {
    VisibilityPass.innerHTML = "visibility";
    Pass.type = "text";
  } else {
    VisibilityPass.innerHTML = "visibility_off";
    Pass.type = "password";
  }
}

function VisibilityNewPassChange() {
  var VisibilityNewPass = document.getElementById("VisibilityNewPass");
  var NewPass = document.getElementById("NewPass");
  if (VisibilityNewPass.textContent == "visibility_off") {
    VisibilityNewPass.innerHTML = "visibility";
    NewPass.type = "text";
  } else {
    VisibilityNewPass.innerHTML = "visibility_off";
    NewPass.type = "password";
  }
}

function VisibilityConfirmPassChange() {
  var VisibilityConfirmPass = document.getElementById("VisibilityConfirmPass");
  var ConfirmPass = document.getElementById("ConfirmPass");
  if (VisibilityConfirmPass.textContent == "visibility_off") {
    VisibilityConfirmPass.innerHTML = "visibility";
    ConfirmPass.type = "text";
  } else {
    VisibilityConfirmPass.innerHTML = "visibility_off";
    ConfirmPass.type = "password";
  }
}
