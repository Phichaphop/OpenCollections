function CheckRole() {
  var Role = document.getElementById("Role");
  var MsgRole = document.getElementById("MsgRole");
  if (Role.value != "") {
    MsgRole.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgRole.innerHTML = "Please select role.";
    } else {
      MsgRole.innerHTML = "โปรดเลือกบทบาท";
    }
  }
}

function CheckName() {
  var Name = document.getElementById("Name");
  var MsgName = document.getElementById("MsgName");
  if (Name.value != "") {
    MsgName.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgName.innerHTML = "Please enter name.";
    } else {
      MsgName.innerHTML = "กรุณากรอกชื่อ";
    }
  }
}

function CheckInputIns() {
  var Ins = document.getElementById("Ins");
  var MsgIns = document.getElementById("MsgIns");
  if (Ins.value != "") {
    MsgIns.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgIns.innerHTML = "Please select name.";
    } else {
      MsgIns.innerHTML = "กรุณาเลือกชื่อ";
    }
  }
}

function CheckInputDept() {
  var Dept = document.getElementById("Dept");
  var MsgDept = document.getElementById("MsgDept");
  if (Dept.value != "") {
    MsgDept.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgDept.innerHTML = "Please select department.";
    } else {
      MsgDept.innerHTML = "กรุณาเลือกแผนก";
    }
  }
}

function CheckInputMajor() {
  var Major = document.getElementById("Major");
  var MsgMajor = document.getElementById("MsgMajor");
  if (Major.value != "") {
    MsgMajor.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgMajor.innerHTML = "Please select major.";
    } else {
      MsgMajor.innerHTML = "กรุณาเลือกวิชาเอก";
    }
  }
}

function CheckInputDegree() {
  var Degree = document.getElementById("Degree");
  var MsgDegree = document.getElementById("MsgDegree");
  if (Degree.value != "") {
    MsgDegree.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgDegree.innerHTML = "Please select degree.";
    } else {
      MsgDegree.innerHTML = "กรุณาเลือกปริญญา";
    }
  }
}

function CheckInputAbstract() {
  var Abstract = document.getElementById("Abstract");
  var MsgAbstract = document.getElementById("MsgAbstract");
  if (Abstract.value != "") {
    MsgAbstract.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgAbstract.innerHTML = "Please enter abstract.";
    } else {
      MsgAbstract.innerHTML = "กรุณากรอกบทคัดย่อ";
    }
  }
}

function CheckInputDate() {
  var Date = document.getElementById("Date");
  var MsgDate = document.getElementById("MsgDate");
  if (Date.value != "") {
    MsgDate.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgDate.innerHTML = "Please enter date.";
    } else {
      MsgDate.innerHTML = "กรุณาระบุวันที่";
    }
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

function CheckInputFile() {
  var File = document.getElementById("File");
  var Insert = document.getElementById("Insert");
  if (File.files.length > 0) {
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
    if (lang == "en") {
      MsgNote.innerHTML = "Please enter note.";
    } else {
      MsgNote.innerHTML = "กรุณากรอกหมายเหตุ";
    }
  }
}

function CheckInputTitle() {
  var Title = document.getElementById("Title");
  var MsgTitle = document.getElementById("MsgTitle");
  if (Title.value != "") {
    MsgTitle.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgTitle.innerHTML = "Please enter title.";
    } else {
      MsgTitle.innerHTML = "กรุณากรอกชื่อเรื่อง";
    }
  }
}

function CheckDetail() {
  var Detail = document.getElementById("Detail");
  var MsgDetail = document.getElementById("MsgDetail");
  if (Detail.value != "") {
    MsgDetail.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgDetail.innerHTML = "Please enter detail.";
    } else {
      MsgDetail.innerHTML = "กรุณากรอกรายละเอียด";
    }
  }
}

function CheckInputPic() {
  var Pic = document.getElementById("Pic");
  var MsgPic = document.getElementById("MsgPic");
  if (Pic.files.length > 0) {
    MsgPic.innerHTML = "";
  } else {
    if (lang == "en") {
      MsgPic.innerHTML = "Please select picture.";
    } else {
      MsgPic.innerHTML = "โปรดเลือกรูปภาพ";
    }
  }
}
