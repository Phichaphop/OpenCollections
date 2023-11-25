function CheckInsertProjectType() {
  var Name = document.getElementById("Name");
  var Insert = document.getElementById("Insert");
  if (Name.value != "") {
    Insert.disabled = false;
    Insert.classList = "btn-pr";
  } else {
    Insert.disabled = true;
    Insert.classList = "btn-se";
  }
}
function CheckUpdateProjectType() {
  var Name = document.getElementById("Name");
  var Update = document.getElementById("Update");
  if (Name.value != "" && Name.value != DataProjectType) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}