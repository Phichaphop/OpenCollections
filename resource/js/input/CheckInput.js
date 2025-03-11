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
  var MsgBoxName = document.getElementById("MsgBoxName");
  var MsgName = document.getElementById("MsgName");
  var MsgIconName = document.getElementById("MsgIconName");
  if (Name.value != "") {
    MsgBoxName.style.display = "flex";
    if (lang == "en") {
      MsgName.innerHTML = "The name format is correct.";
      MsgBoxName.className = "validation-msg done";
      MsgIconName.innerHTML = "done";
    } else {
      MsgName.innerHTML = "รูปแบบชื่อถูกต้อง";
      MsgBoxName.className = "validation-msg done";
      MsgIconName.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgName.innerHTML = "Please enter name.";
      MsgBoxName.className = "validation-msg error";
      MsgIconName.innerHTML = "error";
    } else {
      MsgName.innerHTML = "กรุณากรอกชื่อ";
      MsgBoxName.className = "validation-msg error";
      MsgIconName.innerHTML = "error";
    }
  }
}

function CheckInputDept() {
  var Dept = document.getElementById("Dept");
  var MsgBoxDept = document.getElementById("MsgBoxDept");
  var MsgDept = document.getElementById("MsgDept");
  var MsgIconDept = document.getElementById("MsgIconDept");
  if (Dept.value != "") {
    MsgBoxDept.style.display = "flex";
    if (lang == "en") {
      MsgDept.innerHTML = "Selected department.";
      MsgBoxDept.className = "validation-msg done";
      MsgIconDept.innerHTML = "done";
    } else {
      MsgDept.innerHTML = "เลือกแผนกเรียบร้อย";
      MsgBoxDept.className = "validation-msg done";
      MsgIconDept.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgDept.innerHTML = "Please select department.";
      MsgBoxDept.className = "validation-msg error";
      MsgIconDept.innerHTML = "error";
    } else {
      MsgDept.innerHTML = "กรุณาเลือกแผนก";
      MsgBoxDept.className = "validation-msg error";
      MsgIconDept.innerHTML = "error";
    }
  }
}

function CheckInputDegree() {
  var Degree = document.getElementById("Degree");
  var MsgBoxDegree = document.getElementById("MsgBoxDegree");
  var MsgDegree = document.getElementById("MsgDegree");
  var MsgIconDegree = document.getElementById("MsgIconDegree");
  if (Degree.value != "") {
    MsgBoxDegree.style.display = "flex";
    if (lang == "en") {
      MsgDegree.innerHTML = "Complete the name of educational qualification.";
      MsgBoxDegree.className = "validation-msg done";
      MsgIconDegree.innerHTML = "done";
    } else {
      MsgDegree.innerHTML = "กรอกชื่อวุฒิการศึกษาเรียบร้อย";
      MsgBoxDegree.className = "validation-msg done";
      MsgIconDegree.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgDegree.innerHTML =
        "Please enter the name of your educational background.";
      MsgBoxDegree.className = "validation-msg error";
      MsgIconDegree.innerHTML = "error";
    } else {
      MsgDegree.innerHTML = "กรุณากรอกชื่อวุฒิการศึกษา";
      MsgBoxDegree.className = "validation-msg error";
      MsgIconDegree.innerHTML = "error";
    }
  }
}

function CheckInputAbstract() {
  var Abstract = document.getElementById("Abstract");
  var MsgAbstract = document.getElementById("MsgAbstract");
  var MsgBoxAbstract = document.getElementById("MsgBoxAbstract");
  var MsgAbstract = document.getElementById("MsgAbstract");
  var MsgIconAbstract = document.getElementById("MsgIconAbstract");
  if (Abstract.value != "") {
    MsgBoxAbstract.style.display = "flex";
    if (lang == "en") {
      MsgAbstract.innerHTML = "The abstract is correct.";
      MsgBoxAbstract.className = "validation-msg done";
      MsgIconAbstract.innerHTML = "done";
    } else {
      MsgAbstract.innerHTML = "บทคัดย่อถูกต้อง";
      MsgBoxAbstract.className = "validation-msg done";
      MsgIconAbstract.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgAbstract.innerHTML = "Please enter abstract.";
      MsgBoxAbstract.className = "validation-msg error";
      MsgIconAbstract.innerHTML = "error";
    } else {
      MsgAbstract.innerHTML = "กรุณากรอกบทคัดย่อ";
      MsgBoxAbstract.className = "validation-msg error";
      MsgIconAbstract.innerHTML = "error";
    }
  }
}

function CheckInputDate() {
  var Date = document.getElementById("Date");
  var MsgBoxDate = document.getElementById("MsgBoxDate");
  var MsgDate = document.getElementById("MsgDate");
  var MsgIconDate = document.getElementById("MsgIconDate");
  if (Date.value != "") {
    MsgBoxDate.style.display = "flex";
    if (lang == "en") {
      MsgDate.innerHTML = "The date is correct.";
      MsgBoxDate.className = "validation-msg done";
      MsgIconDate.innerHTML = "done";
    } else {
      MsgDate.innerHTML = "เลือกวันที่สำเรียบร้อย";
      MsgBoxDate.className = "validation-msg done";
      MsgIconDate.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgDate.innerHTML = "Please enter date.";
      MsgBoxDate.className = "validation-msg error";
      MsgIconDate.innerHTML = "error";
    } else {
      MsgDate.innerHTML = "กรุณาระบุวันที่";
      MsgBoxDate.className = "validation-msg error";
      MsgIconDate.innerHTML = "error";
    }
  }
}

function CheckInputFile() {
  var File = document.getElementById("File");
  var MsgBoxFile = document.getElementById("MsgBoxFile");
  var MsgFile = document.getElementById("MsgFile");
  var MsgIconFile = document.getElementById("MsgIconFile");
  if (File.files.length > 0) {
    MsgBoxFile.style.display = "flex";
    if (lang == "en") {
      MsgFile.innerHTML = "The File has been selected.";
      MsgBoxFile.className = "validation-msg done";
      MsgIconFile.innerHTML = "done";
    } else {
      MsgFile.innerHTML = "เลือกไฟล์เรียบร้อย";
      MsgBoxFile.className = "validation-msg done";
      MsgIconFile.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgFile.innerHTML = "Please select File.";
      MsgBoxFile.className = "validation-msg error";
      MsgIconFile.innerHTML = "error";
    } else {
      MsgFile.innerHTML = "โปรดเลือกไฟล์";
      MsgBoxFile.className = "validation-msg error";
      MsgIconFile.innerHTML = "error";
    }
  }
}

function CheckInputNote() {
  var Note = document.getElementById("Note");
  var MsgBoxNote = document.getElementById("MsgBoxNote");
  var MsgNote = document.getElementById("MsgNote");
  var MsgIconNote = document.getElementById("MsgIconNote");
  if (Note.value != "") {
    MsgBoxNote.style.display = "flex";
    if (lang == "en") {
      MsgNote.innerHTML = "Fill in the notes.";
      MsgBoxNote.className = "validation-msg done";
      MsgIconNote.innerHTML = "done";
    } else {
      MsgNote.innerHTML = "กรอกหมายเหตุเรียบร้อย";
      MsgBoxNote.className = "validation-msg done";
      MsgIconNote.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgNote.innerHTML = "Please enter note.";
      MsgBoxNote.className = "validation-msg error";
      MsgIconNote.innerHTML = "error";
    } else {
      MsgNote.innerHTML = "กรุณากรอกหมายเหตุ";
      MsgBoxNote.className = "validation-msg error";
      MsgIconNote.innerHTML = "error";
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
    PreviewPic.style.display = "flex";
    PreviewPic.src = URL.createObjectURL(file);
  } else {
    PreviewPic.style.display = "none";
  }
}
