function CheckUsername() {
  var Username = document.getElementById("Username");
  var MsgBoxUsername = document.getElementById("MsgBoxUsername");
  var MsgUsername = document.getElementById("MsgUsername");
  var MsgIconUsername = document.getElementById("MsgIconUsername");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;

  if (Username.value != "") {
    MsgBoxUsername.style.display = "flex";
    if (
      Username.value.match(upperCaseLetters) ||
      Username.value.match(lowerCaseLetters)
    ) {
      if (Username.value.length >= 9) {
        if (lang == "en") {
          MsgUsername.innerHTML = "The username format is correct.";
          MsgBoxUsername.className = "validation-msg done";
          MsgIconUsername.innerHTML = "done";
        } else {
          MsgUsername.innerHTML = "รูปแบบชื่อผู้ใช้ถูกต้อง";
          MsgBoxUsername.className = "validation-msg done";
          MsgIconUsername.innerHTML = "done";
        }
      } else {
        if (lang == "en") {
          MsgUsername.innerHTML = "Must be more than 9 characters.";
          MsgBoxUsername.className = "validation-msg error";
          MsgIconUsername.innerHTML = "error";
        } else {
          MsgUsername.innerHTML = "ต้องมีตัวอักษรอย่างน้อย 9 ตัวอักษร";
          MsgBoxUsername.className = "validation-msg error";
          MsgIconUsername.innerHTML = "error";
        }
      }
    } else {
      if (lang == "en") {
        MsgUsername.innerHTML = "Must contain letters A-Z or a-z.";
        MsgBoxUsername.className = "validation-msg error";
        MsgIconUsername.innerHTML = "error";
      } else {
        MsgUsername.innerHTML = "ต้องมีตัวอักษร A-Z หรือ a-z";
        MsgBoxUsername.className = "validation-msg error";
        MsgIconUsername.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgUsername.innerHTML = "Please enter your username.";
      MsgBoxUsername.className = "validation-msg error";
      MsgIconUsername.innerHTML = "error";
    } else {
      MsgUsername.innerHTML = "กรุณากรอกชื่อผู้ใช้";
      MsgBoxUsername.className = "validation-msg error";
      MsgIconUsername.innerHTML = "error";
    }
  }
}

function CheckPass() {
  var Pass = document.getElementById("Pass");
  var MsgBoxPass = document.getElementById("MsgBoxPass");
  var MsgPass = document.getElementById("MsgPass");
  var MsgIconPass = document.getElementById("MsgIconPass");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (Pass.value != "") {
    MsgBoxPass.style.display = "flex";
    if (Pass.value.match(upperCaseLetters)) {
      if (Pass.value.match(lowerCaseLetters)) {
        if (Pass.value.match(numbers)) {
          if (Pass.value.length >= 9) {
            if (lang == "en") {
              MsgPass.innerHTML = "The password format is correct.";
              MsgBoxPass.className = "validation-msg done";
              MsgIconPass.innerHTML = "done";
            } else {
              MsgPass.innerHTML = "รูปแบบรหัสผ่านถูกต้อง";
              MsgBoxPass.className = "validation-msg done";
              MsgIconPass.innerHTML = "done";
            }
          } else {
            if (lang == "en") {
              MsgPass.innerHTML =
                "Must be more than 9 characters and not more than 12 characters.";
              MsgBoxPass.className = "validation-msg error";
              MsgIconPass.innerHTML = "error";
            } else {
              MsgPass.innerHTML =
                "ต้องมีความยาวมากกว่า 9 ตัวอักษรและไม่เกิน 12 ตัวอักษร";
              MsgBoxPass.className = "validation-msg error";
              MsgIconPass.innerHTML = "error";
            }
          }
        } else {
          if (lang == "en") {
            MsgPass.innerHTML = "Must have numbers 0-9";
            MsgBoxPass.className = "validation-msg error";
            MsgIconPass.innerHTML = "error";
          } else {
            MsgPass.innerHTML = "ต้องมีตัวเลข 0-9";
            MsgBoxPass.className = "validation-msg error";
            MsgIconPass.innerHTML = "error";
          }
        }
      } else {
        if (lang == "en") {
          MsgPass.innerHTML = "Must contain letters a-z";
          MsgBoxPass.className = "validation-msg error";
          MsgIconPass.innerHTML = "error";
        } else {
          MsgPass.innerHTML = "ต้องมีตัวอักษร a-z";
          MsgBoxPass.className = "validation-msg error";
          MsgIconPass.innerHTML = "error";
        }
      }
    } else {
      if (lang == "en") {
        MsgPass.innerHTML = "Must contain letters A-Z";
        MsgBoxPass.className = "validation-msg error";
        MsgIconPass.innerHTML = "error";
      } else {
        MsgPass.innerHTML = "ต้องมีตัวอักษร A-Z";
        MsgBoxPass.className = "validation-msg error";
        MsgIconPass.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgPass.innerHTML = "Please enter your password";
      MsgBoxPass.className = "validation-msg error";
      MsgIconPass.innerHTML = "error";
    } else {
      MsgPass.innerHTML = "กรุณาใส่รหัสผ่านของคุณ";
      MsgBoxPass.className = "validation-msg error";
      MsgIconPass.innerHTML = "error";
    }
  }
}

function CheckEmail() {
  var Email = document.getElementById("Email");
  var MsgBoxEmail = document.getElementById("MsgBoxEmail");
  var MsgEmail = document.getElementById("MsgEmail");
  var MsgIconEmail = document.getElementById("MsgIconEmail");
  var emailFormat =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (Email.value != "") {
    MsgBoxEmail.style.display = "flex";
    if (Email.value.match(emailFormat)) {
      if (lang == "en") {
        MsgEmail.innerHTML = "The email format is correct.";
        MsgBoxEmail.className = "validation-msg done";
        MsgIconEmail.innerHTML = "done";
      } else {
        MsgEmail.innerHTML = "รูปแบบอีเมลถูกต้อง";
        MsgBoxEmail.className = "validation-msg done";
        MsgIconEmail.innerHTML = "done";
      }
    } else {
      if (lang == "en") {
        MsgEmail.innerHTML = "Invalid email format.";
        MsgBoxEmail.className = "validation-msg error";
        MsgIconEmail.innerHTML = "error";
      } else {
        MsgEmail.innerHTML = "รูปแบบอีเมลไม่ถูกต้อง";
        MsgBoxEmail.className = "validation-msg error";
        MsgIconEmail.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgEmail.innerHTML = "Please Enter Your Email Address.";
      MsgBoxEmail.className = "validation-msg error";
      MsgIconEmail.innerHTML = "error";
    } else {
      MsgEmail.innerHTML = "กรุณากรอกอีเมล";
      MsgBoxEmail.className = "validation-msg error";
      MsgIconEmail.innerHTML = "error";
    }
  }
}

function CheckTel() {
  var Tel = document.getElementById("Tel");
  var MsgBoxTel = document.getElementById("MsgBoxTel");
  var MsgTel = document.getElementById("MsgTel");
  var MsgIconTel = document.getElementById("MsgIconTel");
  var numbers = /[0-9]/g;
  if (Tel.value != "") {
    MsgBoxTel.style.display = "flex";
    if (Tel.value.match(numbers)) {
      if (Tel.value.length >= 10) {
        if (lang == "en") {
          MsgTel.innerHTML = "The phone model is correct.";
          MsgBoxTel.className = "validation-msg done";
          MsgIconTel.innerHTML = "done";
        } else {
          MsgTel.innerHTML = "รูปแบบโทรศัพท์ถูกต้อง";
          MsgBoxTel.className = "validation-msg done";
          MsgIconTel.innerHTML = "done";
        }
      } else {
        if (lang == "en") {
          MsgTel.innerHTML = "Must be more than 10 characters.";
          MsgBoxTel.className = "validation-msg error";
          MsgIconTel.innerHTML = "error";
        } else {
          MsgTel.innerHTML = "จะต้องมากกว่า 10 ตัวอักษร";
          MsgBoxTel.className = "validation-msg error";
          MsgIconTel.innerHTML = "error";
        }
      }
    } else {
      if (lang == "en") {
        MsgTel.innerHTML = "Must have numbers 0-9";
        MsgBoxTel.className = "validation-msg error";
        MsgIconTel.innerHTML = "error";
      } else {
        MsgTel.innerHTML = "ต้องมีตัวเลข 0-9";
        MsgBoxTel.className = "validation-msg error";
        MsgIconTel.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgTel.innerHTML = "Please Enter Your Tel.";
      MsgBoxTel.className = "validation-msg error";
      MsgIconTel.innerHTML = "error";
    } else {
      MsgTel.innerHTML = "กรุณากรอกหมายเลขโทรศัพท์ของคุณ";
      MsgBoxTel.className = "validation-msg error";
      MsgIconTel.innerHTML = "error";
    }
  }
}

function CheckPolicy() {
  var Policy = document.getElementById("Policy");
  var MsgBoxPolicy = document.getElementById("MsgBoxPolicy");
  var MsgPolicy = document.getElementById("MsgPolicy");
  var MsgIconPolicy = document.getElementById("MsgIconPolicy");
  if (Policy.checked == true) {
    MsgBoxPolicy.style.display = "flex";
    if (lang == "en") {
      MsgPolicy.innerHTML = "You have accepted the policy.";
      MsgBoxPolicy.className = "validation-msg done";
      MsgIconPolicy.innerHTML = "done";
    } else {
      MsgPolicy.innerHTML = "คุณได้ยอมรับนโยบายเรียบร้อย";
      MsgBoxPolicy.className = "validation-msg done";
      MsgIconPolicy.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgPolicy.innerHTML = "Please accept the policy.";
      MsgBoxPolicy.className = "validation-msg error";
      MsgIconPolicy.innerHTML = "error";
    } else {
      MsgPolicy.innerHTML = "กรุณายอมรับนโยบาย";
      MsgBoxPolicy.className = "validation-msg error";
      MsgIconPolicy.innerHTML = "error";
    }
  }
}

function SignIn() {
  var Username = document.getElementById("Username");
  var Pass = document.getElementById("Pass");
  var SignIn = document.getElementById("SignIn");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (Username.value != "" && Username.value.length >= 9) {
    if (
      Pass.value != "" &&
      Pass.value.match(upperCaseLetters) &&
      Pass.value.match(lowerCaseLetters) &&
      Pass.value.match(numbers) &&
      Pass.value.length >= 9
    ) {
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
  var Policy = document.getElementById("Policy");
  var SignUp = document.getElementById("SignUp");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;
  var emailFormat =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (Username.value != "" && Username.value.length >= 9) {
    if (
      Pass.value != "" &&
      Pass.value.match(upperCaseLetters) &&
      Pass.value.match(lowerCaseLetters) &&
      Pass.value.match(numbers) &&
      Pass.value.length >= 9
    ) {
      if (Email.value != "" && Email.value.match(emailFormat)) {
        if (
          Tel.value != "" &&
          Tel.value.match(numbers) &&
          Tel.value.length >= 10
        ) {
          if (Policy.checked == true) {
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
  var emailFormat =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (Email.value != "" && Email.value.match(emailFormat)) {
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
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;
  var numbers = /[0-9]/g;

  if (NewPass.value != "") {
    if (
      ConfirmPass.value != "'" &&
      ConfirmPass.value.match(upperCaseLetters) &&
      ConfirmPass.value.match(lowerCaseLetters) &&
      ConfirmPass.value.match(numbers) &&
      ConfirmPass.value.length >= 9
    ) {
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

function CheckUsernameEmail() {
  var Username = document.getElementById("Username");
  var MsgBoxUsername = document.getElementById("MsgBoxUsername");
  var MsgUsername = document.getElementById("MsgUsername");
  var MsgIconUsername = document.getElementById("MsgIconUsername");
  var upperCaseLetters = /[A-Z]/g;
  var lowerCaseLetters = /[a-z]/g;

  if (Username.value != "") {
    MsgBoxUsername.style.display = "flex";
    if (
      Username.value.match(upperCaseLetters) ||
      Username.value.match(lowerCaseLetters)
    ) {
      if (Username.value.length >= 9) {
        if (lang == "en") {
          MsgUsername.innerHTML = "The username format is correct.";
          MsgBoxUsername.className = "validation-msg done";
          MsgIconUsername.innerHTML = "done";
        } else {
          MsgUsername.innerHTML = "รูปแบบชื่อผู้ใช้ถูกต้อง";
          MsgBoxUsername.className = "validation-msg done";
          MsgIconUsername.innerHTML = "done";
        }
      } else {
        if (lang == "en") {
          MsgUsername.innerHTML = "Must be more than 9 characters.";
          MsgBoxUsername.className = "validation-msg error";
          MsgIconUsername.innerHTML = "error";
        } else {
          MsgUsername.innerHTML = "ต้องมีตัวอักษรอย่างน้อย 9 ตัวอักษร";
          MsgBoxUsername.className = "validation-msg error";
          MsgIconUsername.innerHTML = "error";
        }
      }
    } else {
      if (lang == "en") {
        MsgUsername.innerHTML = "Must contain letters A-Z or a-z.";
        MsgBoxUsername.className = "validation-msg error";
        MsgIconUsername.innerHTML = "error";
      } else {
        MsgUsername.innerHTML = "ต้องมีตัวอักษร A-Z หรือ a-z";
        MsgBoxUsername.className = "validation-msg error";
        MsgIconUsername.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgUsername.innerHTML = "Please enter your username.";
      MsgBoxUsername.className = "validation-msg error";
      MsgIconUsername.innerHTML = "error";
    } else {
      MsgUsername.innerHTML = "กรุณากรอกชื่อผู้ใช้";
      MsgBoxUsername.className = "validation-msg error";
      MsgIconUsername.innerHTML = "error";
    }
  }
}
