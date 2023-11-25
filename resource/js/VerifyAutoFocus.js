function VerifyAutoFocus() {
  var V1 = document.getElementById("V1");
  var V2 = document.getElementById("V2");
  var V3 = document.getElementById("V3");
  var V4 = document.getElementById("V4");
  var V5 = document.getElementById("V5");
  var V6 = document.getElementById("V6");
  var Verify = document.getElementById("Verify");

  if (V1.value == "") {
    V1.focus();
    VerifyEmail();
  } else if (V1.value != "") {
    V2.focus();
    VerifyEmail();
    if (V2.value != "") {
      V3.focus();
      VerifyEmail();
      if (V3.value != "") {
        V4.focus();
        VerifyEmail();
        if (V4.value != "") {
          V5.focus();
          VerifyEmail();
          if (V5.value != "") {
            V6.focus();
            VerifyEmail();
            if (V6.value != "") {
              Verify.focus();
              VerifyEmail();
            } else {
              V6.focus();
              VerifyEmail();
            }
          } else {
            V5.focus();
            VerifyEmail();
          }
        } else {
          V4.focus();
          VerifyEmail();
        }
      } else {
        V3.focus();
        VerifyEmail();
      }
    } else {
      V2.focus();
      VerifyEmail();
    }
  } else {
  }
}

function VerifyEmail() {
  var V1 = document.getElementById("V1");
  var V2 = document.getElementById("V2");
  var V3 = document.getElementById("V3");
  var V4 = document.getElementById("V4");
  var V5 = document.getElementById("V5");
  var V6 = document.getElementById("V6");
  var Verify = document.getElementById("Verify");
  var MsgVerify = document.getElementById("MsgVerify");
  if (V1.value != "") {
    if (V2.value != "") {
      if (V3.value != "") {
        if (V4.value != "") {
          if (V5.value != "") {
            if (V6.value != "") {
              var Vc1 = +document.getElementById("V1").value;
              var Vc2 = +document.getElementById("V2").value;
              var Vc3 = +document.getElementById("V3").value;
              var Vc4 = +document.getElementById("V4").value;
              var Vc5 = +document.getElementById("V5").value;
              var Vc6 = +document.getElementById("V6").value;
              var code = "" + Vc1 + Vc2 + Vc3 + Vc4 + Vc5 + Vc6;
              if (code == VerifyCode) {
                Verify.disabled = false;
                Verify.classList = "btn-pr";
              } else {
                Verify.disabled = true;
                Verify.classList = "btn-se";
              }
            } else {
              Verify.disabled = true;
              Verify.classList = "btn-se";
            }
          } else {
            Verify.disabled = true;
            Verify.classList = "btn-se";
          }
        } else {
          Verify.disabled = true;
          Verify.classList = "btn-se";
        }
      } else {
        Verify.disabled = true;
        Verify.classList = "btn-se";
      }
    } else {
      Verify.disabled = true;
      Verify.classList = "btn-se";
    }
  } else {
    Verify.disabled = true;
    Verify.classList = "btn-se";
  }
}
