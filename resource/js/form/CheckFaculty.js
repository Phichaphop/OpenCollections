function CheckInsertFaculty() {
  var Name = document.getElementById("Name");
  var Ins = document.getElementById("Ins");
  var Insert = document.getElementById("Insert");
  if (Name.value != "") {
    if (Ins.value != "") {
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

function CheckUpdateFaculty() {
  var Name = document.getElementById("Name");
  var Ins = document.getElementById("Ins");
  var Update = document.getElementById("Update");
  if (Name.value != "" || Name.value != DataFaculty) {
    if (Ins.value != "" || Ins.value != DataIns) {
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
