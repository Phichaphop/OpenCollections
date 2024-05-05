function CheckVerifyPass() {
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