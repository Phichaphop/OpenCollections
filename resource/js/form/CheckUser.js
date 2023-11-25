function CheckInsertUser() {
  var Username = document.getElementById("Username");
  var Pass = document.getElementById("Pass");
  var Email = document.getElementById("Email");
  var Tel = document.getElementById("Tel");
  var Role = document.getElementById("Role");
  var Insert = document.getElementById("Insert");

  if (Username.value != "") {
    if (Pass.value != "") {
      if (Email.value != "") {
        if (Tel.value != "") {
          if (Role.value != "") {
            Insert.disabled = false;
            Insert.classList = "btn-pr";
          } else {
            Insert.disabled = true;
            Insert.classList = "btn-se";
          }
        } else {
          Insert.disabled = true;
          Insert.classList = "btn-se";
        }
      } else {
        Insert.disabled = true;
        Insert.classList = "btn-se";
      }
    } else {
      Insert.disabled = true;
      Insert.classList = "btn-se";
    }
  } else {
    Insert.disabled = true;
    Insert.classList = "btn-se";
  }
}

function CheckUpdateUser() {
  var Username = document.getElementById("Username");
  var MsgUsername = document.getElementById("MsgUsername");
  var Update = document.getElementById("Update");
  if (Username.value != "") {
    if (Username.value != DataUsername) {
      Update.disabled = false;
      Update.classList = "btn-pr";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
      MsgUsername.innerHTML = "Same username";
    }
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function CheckUpdateTel() {
  var Tel = document.getElementById("Tel");
  var Update = document.getElementById("Update");
  var numbers = /[0-9]/g;
  if (Tel.value != "" && Tel.value != DataTel) {
    if (Tel.value.match(numbers)) {
      Update.disabled = false;
      Update.classList = "btn-pr";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
    }
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function CheckUpdatePass() {
  var Pass = document.getElementById("Pass");
  var NewPass = document.getElementById("NewPass");
  var ConfirmPass = document.getElementById("ConfirmPass");
  var Update = document.getElementById("Update");

  if (Pass.value != "" && NewPass.value != "" && ConfirmPass != "") {
    if (Pass.value != NewPass.value) {
      if (NewPass.value == ConfirmPass.value) {
        Update.disabled = false;
        Update.classList = "btn-pr";
      } else {
        Update.disabled = true;
        Update.classList = "btn-se";
      }
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
    }
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function CheckUpdatePassFromAdmin() {
  var Pass = document.getElementById("Pass");
  var Update = document.getElementById("Update");

  if (Pass.value != "") {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function CheckNewPass() {
  var Pass = document.getElementById("Pass");
  var NewPass = document.getElementById("NewPass");
  var MsgNewPass = document.getElementById("MsgNewPass");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (NewPass.value != "") {
    if (NewPass.value.match(upperCaseLetters)) {
      if (NewPass.value.match(lowerCaseLetters)) {
        if (NewPass.value.match(numbers)) {
          if (NewPass.value.length >= 9) {
            if (Pass.value != NewPass.value) {
              MsgNewPass.innerHTML = "";
            } else {
              MsgNewPass.innerHTML = "Password as before.";
            }
          } else {
            MsgNewPass.innerHTML =
              "Must be more than 9 characters and not more than 12 characters.";
          }
        } else {
          MsgNewPass.innerHTML = "Must have numbers 0-9";
        }
      } else {
        MsgNewPass.innerHTML = "Must contain letters a-z";
      }
    } else {
      MsgNewPass.innerHTML = "Must contain letters A-Z";
    }
  } else {
    MsgNewPass.innerHTML = "Please enter your password";
  }
}

function CheckConfirmPass() {
  var NewPass = document.getElementById("NewPass");
  var ConfirmPass = document.getElementById("ConfirmPass");
  var MsgConfirmPass = document.getElementById("MsgConfirmPass");

  if (ConfirmPass != "") {
    if (NewPass.value == ConfirmPass.value) {
      MsgConfirmPass.innerHTML = "Passwords match";
      MsgConfirmPass.style.color = "var(--green-l1--)";
      MsgConfirmPass.style.textAlign = "center";
    } else {
      MsgConfirmPass.innerHTML = "Passwords do not match";
    }
  } else {
    MsgConfirmPass.innerHTML = "Please confirm your pass";
  }
}

function CheckResetPass() {
  var NewPass = document.getElementById("NewPass");
  var MsgNewPass = document.getElementById("MsgNewPass");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (NewPass.value != "") {
    if (NewPass.value.match(upperCaseLetters)) {
      if (NewPass.value.match(lowerCaseLetters)) {
        if (NewPass.value.match(numbers)) {
          if (NewPass.value.length >= 9) {
            MsgNewPass.innerHTML = "";
          } else {
            MsgNewPass.innerHTML =
              "Must be more than 9 characters and not more than 12 characters.";
          }
        } else {
          MsgNewPass.innerHTML = "Must have numbers 0-9";
        }
      } else {
        MsgNewPass.innerHTML = "Must contain letters a-z";
      }
    } else {
      MsgNewPass.innerHTML = "Must contain letters A-Z";
    }
  } else {
    MsgNewPass.innerHTML = "Please enter your password";
  }
}

function CheckUpdateRole() {
  var Role = document.getElementById("Role");
  var Update = document.getElementById("Update");
  var MsgRole = document.getElementById("MsgRole");
  if (Role.value != "") {
    if (Role.value != DataRole) {
      Update.disabled = false;
      Update.classList = "btn-pr";
      MsgRole.innerHTML = "";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
      MsgRole.innerHTML = "Role as before.";
    }
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
    MsgRole.innerHTML = "Please select role.";
  }
}

function CheckUpdateEmail() {
  var Email = document.getElementById("Email");
  var Update = document.getElementById("Update");
  if (Email.value != "" && Email.value != DataEmail) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function CheckUpdatePicture() {
  var Pic = document.getElementById("Pic");
  var Update = document.getElementById("Update");
  if (Pic.files.length > 0) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}

function PreviewPicture() {
  let Pic = document.getElementById("Pic");
  let PreviewPic = document.getElementById("PreviewPic");

  const [file] = Pic.files;
  if (file) {
    PreviewPic.src = URL.createObjectURL(file);
  }
}

function CheckDeleteUser() {
  var Pass = document.getElementById("Pass");
  var Delete = document.getElementById("Delete");

  if (Pass.value != "") {
    Delete.disabled = false;
    Delete.classList = "btn-pr";
  } else {
    Delete.disabled = true;
    Delete.classList = "btn-se";
  }
}
