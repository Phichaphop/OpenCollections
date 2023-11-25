function CheckInsertDept() {
  var Name = document.getElementById("Name");
  var Faculty = document.getElementById("Faculty");
  var Insert = document.getElementById("Insert");
  if (Name.value != "") {
    if (Faculty.value != "") {
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
}
function CheckUpdateDept() {
  var Name = document.getElementById("Name");
  var Faculty = document.getElementById("Faculty");
  var Update = document.getElementById("Update");
  if (Name.value != "" || Name.value != DataDept) {
    if (Faculty.value != "" || Faculty.value != DataFaculty) {
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
