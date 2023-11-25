function CheckRole() {
  var Role = document.getElementById("Role");
  var MsgRole = document.getElementById("MsgRole");
  if (Role.value != "") {
    MsgRole.innerHTML = "";
  } else {
    MsgRole.innerHTML = "Please select role.";
  }
}

function CheckName() {
  var Name = document.getElementById("Name");
  var MsgName = document.getElementById("MsgName");
  if (Name.value != "") {
    MsgName.innerHTML = "";
  } else {
    MsgName.innerHTML = "Please enter name.";
  }
}

function CheckInputIns() {
  var Ins = document.getElementById("Ins");
  var MsgIns = document.getElementById("MsgIns");
  if (Ins.value != "") {
    MsgIns.innerHTML = "";
  } else {
    MsgIns.innerHTML = "Please select name.";
  }
}

function CheckInputDept() {
  var Dept = document.getElementById("Dept");
  var MsgDept = document.getElementById("MsgDept");
  if (Dept.value != "") {
    MsgDept.innerHTML = "";
  } else {
    MsgDept.innerHTML = "Please select department.";
  }
}

function CheckInputMajor() {
  var Major = document.getElementById("Major");
  var MsgMajor = document.getElementById("MsgMajor");
  if (Major.value != "") {
    MsgMajor.innerHTML = "";
  } else {
    MsgMajor.innerHTML = "Please select major.";
  }
}

function CheckInputDegree() {
  var Degree = document.getElementById("Degree");
  var MsgDegree = document.getElementById("MsgDegree");
  if (Degree.value != "") {
    MsgDegree.innerHTML = "";
  } else {
    MsgDegree.innerHTML = "Please select degree.";
  }
}

function CheckInputAbstract() {
  var Abstract = document.getElementById("Abstract");
  var MsgAbstract = document.getElementById("MsgAbstract");
  if (Abstract.value != "") {
    MsgAbstract.innerHTML = "";
  } else {
    MsgAbstract.innerHTML = "Please enter abstract.";
  }
}

function CheckInputDate() {
  var Date = document.getElementById("Date");
  var MsgDate = document.getElementById("MsgDate");
  if (Date.value != "") {
    MsgDate.innerHTML = "";
  } else {
    MsgDate.innerHTML = "Please enter date.";
  }
}

function CheckInputProjectFile() {
  var ProjectFile = document.getElementById("ProjectFile");
  var Insert = document.getElementById("Insert");
  if (ProjectFile.files.length > 0) {
    Insert.disabled = false;
    Insert.classList = "btn-pr";
  } else {
    Insert.disabled = true;
    Insert.classList = "btn-se";
  }
}

function CheckInputProjectPicture() {
  var ProjectPicture = document.getElementById("ProjectPicture");
  var Insert = document.getElementById("Insert");
  if (ProjectPicture.files.length > 0) {
    Insert.disabled = false;
    Insert.classList = "btn-pr";
  } else {
    Insert.disabled = true;
    Insert.classList = "btn-se";
  }
}

function CheckInputNote() {
  var Note = document.getElementById("Note");
  var MsgNote = document.getElementById("MsgNote");
  if (Note.value != "") {
    MsgNote.innerHTML = "";
  } else {
    MsgNote.innerHTML = "Please enter note.";
  }
}

function CheckInputTitle() {
  var Title = document.getElementById("Title");
  var MsgTitle = document.getElementById("MsgTitle");
  if (Title.value != "") {
    MsgTitle.innerHTML = "";
  } else {
    MsgTitle.innerHTML = "Please enter title.";
  }
}

function CheckDetail() {
  var Detail = document.getElementById("Detail");
  var MsgDetail = document.getElementById("MsgDetail");
  if (Detail.value != "") {
    MsgDetail.innerHTML = "";
  } else {
    MsgDetail.innerHTML = "Please enter detail.";
  }
}

function CheckInputPic() {
  var Pic = document.getElementById("Pic");
  var MsgPic = document.getElementById("MsgPic");
  if (Pic.files.length > 0) {
    MsgPic.innerHTML = "";
  } else {
    MsgPic.innerHTML = "Please select picture.";
  }
}
