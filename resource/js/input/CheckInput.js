function CheckRole() {
  var Role = document.getElementById("Role");
  var MsgBoxRole = document.getElementById("MsgBoxRole");
  var MsgRole = document.getElementById("MsgRole");
  var MsgIconRole = document.getElementById("MsgIconRole");
  if (Role.value != "") {
    MsgBoxRole.style.display = "flex";
    if (lang == "en") {
      MsgRole.innerHTML = "The role has been selected.";
      MsgBoxRole.className = "validation-msg done";
      MsgIconRole.innerHTML = "done";
    } else {
      MsgRole.innerHTML = "เลือกบทบาทเรียบร้อย";
      MsgBoxRole.className = "validation-msg done";
      MsgIconRole.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgRole.innerHTML = "Please select role.";
      MsgBoxRole.className = "validation-msg error";
      MsgIconRole.innerHTML = "error";
    } else {
      MsgRole.innerHTML = "โปรดเลือกบทบาท";
      MsgBoxRole.className = "validation-msg error";
      MsgIconRole.innerHTML = "error";
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
  var MsgBoxTitle = document.getElementById("MsgBoxTitle");
  var MsgTitle = document.getElementById("MsgTitle");
  var MsgIconTitle = document.getElementById("MsgIconTitle");
  if (Title.value != "") {
    MsgBoxTitle.style.display = "flex";
    if (lang == "en") {
      MsgTitle.innerHTML = "The title format is correct.";
      MsgBoxTitle.className = "validation-msg done";
      MsgIconTitle.innerHTML = "done";
    } else {
      MsgTitle.innerHTML = "รูปแบบชื่อเรื่องถูกต้อง";
      MsgBoxTitle.className = "validation-msg done";
      MsgIconTitle.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgTitle.innerHTML = "Please enter title.";
      MsgBoxTitle.className = "validation-msg error";
      MsgIconTitle.innerHTML = "error";
    } else {
      MsgTitle.innerHTML = "กรุณากรอกชื่อเรื่อง";
      MsgBoxTitle.className = "validation-msg error";
      MsgIconTitle.innerHTML = "error";
    }
  }
}

function CheckDetail() {
  var Detail = document.getElementById("Detail");
  var MsgBoxDetail = document.getElementById("MsgBoxDetail");
  var MsgDetail = document.getElementById("MsgDetail");
  var MsgIconDetail = document.getElementById("MsgIconDetail");
  if (Detail.value != "") {
    MsgBoxDetail.style.display = "flex";
    if (lang == "en") {
      MsgDetail.innerHTML = "The details format is correct.";
      MsgBoxDetail.className = "validation-msg done";
      MsgIconDetail.innerHTML = "done";
    } else {
      MsgDetail.innerHTML = "รูปแบบรายละเอียดถูกต้อง";
      MsgBoxDetail.className = "validation-msg done";
      MsgIconDetail.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgDetail.innerHTML = "Please enter detail.";
      MsgBoxDetail.className = "validation-msg error";
      MsgIconDetail.innerHTML = "error";
    } else {
      MsgDetail.innerHTML = "กรุณากรอกรายละเอียด";
      MsgBoxDetail.className = "validation-msg error";
      MsgIconDetail.innerHTML = "error";
    }
  }
}

function CheckInputPic() {
  var Pic = document.getElementById("Pic");
  var MsgBoxPic = document.getElementById("MsgBoxPic");
  var MsgPic = document.getElementById("MsgPic");
  var MsgIconPic = document.getElementById("MsgIconPic");
  if (Pic.files.length > 0) {
    MsgBoxPic.style.display = "flex";
    if (lang == "en") {
      MsgPic.innerHTML = "The picture has been selected.";
      MsgBoxPic.className = "validation-msg done";
      MsgIconPic.innerHTML = "done";
    } else {
      MsgPic.innerHTML = "เลือกรูปภาพเรียบร้อย";
      MsgBoxPic.className = "validation-msg done";
      MsgIconPic.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgPic.innerHTML = "Please select picture.";
      MsgBoxPic.className = "validation-msg error";
      MsgIconPic.innerHTML = "error";
    } else {
      MsgPic.innerHTML = "โปรดเลือกรูปภาพ";
      MsgBoxPic.className = "validation-msg error";
      MsgIconPic.innerHTML = "error";
    }
  }
}

function CheckIns() {
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

function CheckVerifyCode() {
  var InputVerifyCode = document.getElementById("InputVerifyCode");
  var MsgBoxVerify = document.getElementById("MsgBoxVerify");
  var MsgVerify = document.getElementById("MsgVerify");
  var MsgIconVerify = document.getElementById("MsgIconVerify");

  if (InputVerifyCode.value != "") {
    MsgBoxVerify.style.display = "flex";
    if (InputVerifyCode.value == VerifyCode) {
      if (lang == "en") {
        MsgVerify.innerHTML = "OTP is correct.";
        MsgBoxVerify.className = "validation-msg done";
        MsgIconVerify.innerHTML = "done";
      } else {
        MsgVerify.innerHTML = "OTP ถูกต้อง";
        MsgBoxVerify.className = "validation-msg done";
        MsgIconVerify.innerHTML = "done";
      }
    } else {
      if (lang == "en") {
        MsgVerify.innerHTML = "OTP is invalid.";
        MsgBoxVerify.className = "validation-msg error";
        MsgIconVerify.innerHTML = "error";
      } else {
        MsgVerify.innerHTML = "OTP ไม่ถูกต้อง";
        MsgBoxVerify.className = "validation-msg error";
        MsgIconVerify.innerHTML = "error";
      }
    }
  } else {
    if (lang == "en") {
      MsgVerify.innerHTML = "Please enter OTP.";
      MsgBoxVerify.className = "validation-msg error";
      MsgIconVerify.innerHTML = "error";
    } else {
      MsgVerify.innerHTML = "กรุณากรอก OTP";
      MsgBoxVerify.className = "validation-msg error";
      MsgIconVerify.innerHTML = "error";
    }
  }
}

function PreviewPicture() {
  let Pic = document.getElementById("Pic");
  let PreviewPic = document.getElementById("PreviewPic");
  const [file] = Pic.files;

  if (file) {
    PreviewPic.style.display = "flex"
    PreviewPic.src = URL.createObjectURL(file);
  } else {
    PreviewPic.style.display = "none"
  }
}