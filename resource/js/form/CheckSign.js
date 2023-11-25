function CheckUsername() {
  var Username = document.getElementById("Username");
  var MsgUsername = document.getElementById("MsgUsername");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;

  if (Username.value != "") {
    if (
      Username.value.match(upperCaseLetters) ||
      Username.value.match(lowerCaseLetters)
    ) {
      if (Username.value.length >= 9) {
        MsgUsername.innerHTML = "";
      } else {
        MsgUsername.innerHTML = "Must be more than 9 characters.";
      }
    } else {
      MsgUsername.innersTML = "Must contain letters A-Z or a-z.";
    }
  } else {
    MsgUsername.innerHTML = "Please enter your username.";
  }
}

function CheckPass() {
  var Pass = document.getElementById("Pass");
  var MsgPass = document.getElementById("MsgPass");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (Pass.value != "") {
    if (Pass.value.match(upperCaseLetters)) {
      if (Pass.value.match(lowerCaseLetters)) {
        if (Pass.value.match(numbers)) {
          if (Pass.value.length >= 9) {
            MsgPass.innerHTML = "";
          } else {
            MsgPass.innerHTML =
              "Must be more than 9 characters and not more than 12 characters.";
          }
        } else {
          MsgPass.innerHTML = "Must have numbers 0-9";
        }
      } else {
        MsgPass.innerHTML = "Must contain letters a-z";
      }
    } else {
      MsgPass.innerHTML = "Must contain letters A-Z";
    }
  } else {
    MsgPass.innerHTML = "Please enter your password";
  }
}

function CheckEmail() {
  var Email = document.getElementById("Email");
  var MsgEmail = document.getElementById("MsgEmail");
  if (Email.value != "") {
    MsgEmail.innerHTML = "";
  } else {
    MsgEmail.innerHTML = "Please Enter Your Email Address.";
  }
}

function CheckTel() {
  var Tel = document.getElementById("Tel");
  var MsgTel = document.getElementById("MsgTel");
  var numbers = /[0-9]/g;
  if (Tel.value != "") {
    if (Tel.value.match(numbers)) {
      if (Tel.value.length >= 10) {
        MsgTel.innerHTML = "";
      } else {
        MsgTel.innerHTML = "Must be more than 10 characters.";
      }
    } else {
      MsgTel.innerHTML = "Must have numbers 0-9";
    }
  } else {
    MsgTel.innerHTML = "Please Enter Your Tel.";
  }
}

function CheckIns() {
  var Ins = document.getElementById("Ins");
  var MsgIns = document.getElementById("MsgIns");
  if (Ins.value != "") {
    MsgIns.innerHTML = "";
  } else {
    MsgIns.innerHTML = "Please select name.";
  }
}

function CheckAccessPolicy() {
  var AccessPolicy = document.getElementById("AccessPolicy");
  var MsgAccessPolicy = document.getElementById("MsgAccessPolicy");
  if (AccessPolicy.checked == false) {
    MsgAccessPolicy.innerHTML = "Please Access Policy.";
  } else {
    MsgAccessPolicy.innerHTML = "";
  }
}

function SignIn() {
  var Username = document.getElementById("Username");
  var Pass = document.getElementById("Pass");
  var SignIn = document.getElementById("SignIn");
  if (Username.value != "") {
    if (Pass.value != "") {
      SignIn.disabled = false;
      SignIn.classList = "btn-pr";
    } else {
      SignIn.disabled = true;
      SignIn.classList = "btn-se";
    }
  } else {
    SignIn.disabled = true;
    SignIn.classList = "btn-se";
  }
}

function SignUp() {
  var Username = document.getElementById("Username");
  var Pass = document.getElementById("Pass");
  var Email = document.getElementById("Email");
  var Tel = document.getElementById("Tel");
  var AccessPolicy = document.getElementById("AccessPolicy");
  var SignUp = document.getElementById("SignUp");

  if (Username.value != "") {
    if (Pass.value != "") {
      if (Email.value != "") {
        if (Tel.value != "") {
          if (AccessPolicy.checked == true) {
            SignUp.disabled = false;
            SignUp.classList = "btn-pr";
          } else {
            SignUp.disabled = true;
            SignUp.classList = "btn-se";
          }
        } else {
          SignUp.disabled = true;
          SignUp.classList = "btn-se";
        }
      } else {
        SignUp.disabled = true;
        SignUp.classList = "btn-se";
      }
    } else {
      SignUp.disabled = true;
      SignUp.classList = "btn-se";
    }
  } else {
    SignUp.disabled = true;
    SignUp.classList = "btn-se";
  }
}

function CheckForgetPass() {
  var Email = document.getElementById("Email");
  var ForgetPass = document.getElementById("ForgetPass");
  if (Email.value != "") {
    ForgetPass.disabled = false;
    ForgetPass.classList = "btn-pr";
  } else {
    ForgetPass.disabled = true;
    ForgetPass.classList = "btn-se";
  }
}

function CheckForGetResetPass() {
  var NewPass = document.getElementById("NewPass");
  var ConfirmPass = document.getElementById("ConfirmPass");
  var ResetPass = document.getElementById("ResetPass");
  if (NewPass.value != "") {
    if (ConfirmPass.value != "'") {
      if (NewPass.value == ConfirmPass.value) {
        ResetPass.disabled = false;
        ResetPass.classList = "btn-pr";
      } else {
        ResetPass.disabled = true;
        ResetPass.classList = "btn-se";
      }
    } else {
      ResetPass.disabled = true;
      ResetPass.classList = "btn-se";
    }
  } else {
    ResetPass.disabled = true;
    ResetPass.classList = "btn-se";
  }
}