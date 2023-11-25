function VerifyEmail() {
  var InputVerifyCode = document.getElementById("InputVerifyCode")
  var BtnVerify = document.getElementById("BtnVerify")
  var MsgVerify = document.getElementById("MsgVerify")

  if (InputVerifyCode.value != "") {
    if (InputVerifyCode.value == VerifyCode) {
      BtnVerify.disabled = false
      BtnVerify.classList = "btn-pr"
      MsgVerify.innerHTML = ""
    } else {
      BtnVerify.disabled = true
      BtnVerify.classList = "btn-se"
      MsgVerify.innerHTML = "Please Enter Verify Code."
    }
  }
}
