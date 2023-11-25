function CheckInsertMajor() {
  var Name = document.getElementById("Name");
  var Degree = document.getElementById("Degree");
  var Dept = document.getElementById("Dept");
  var Insert = document.getElementById("Insert");
  if (Name.value != "") {
    if (Degree.value != "") {
      if (Dept.value != "") {
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
}
function CheckUpdateMajor() {
  var Name = document.getElementById("Name");
  var Degree = document.getElementById("Degree");
  var Dept = document.getElementById("Dept");
  var Update = document.getElementById("Update");
  if (Name.value != "" || Name.value != DataMajor) {
    if (Degree.value != "" || Degree.value != DataDegree) {
      if (Dept.value != "" || Dept.value != DataDept) {
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
