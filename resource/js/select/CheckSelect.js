function CheckSelectDept() {
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

function CheckSelectFaculty() {
  var Faculty = document.getElementById("Faculty");
  var MsgBoxFaculty = document.getElementById("MsgBoxFaculty");
  var MsgFaculty = document.getElementById("MsgFaculty");
  var MsgIconFaculty = document.getElementById("MsgIconFaculty");
  if (Faculty.value != "") {
    MsgBoxFaculty.style.display = "flex";
    if (lang == "en") {
      MsgFaculty.innerHTML = "Faculty selected.";
      MsgBoxFaculty.className = "validation-msg done";
      MsgIconFaculty.innerHTML = "done";
    } else {
      MsgFaculty.innerHTML = "เลือกคณะเรียบร้อย";
      MsgBoxFaculty.className = "validation-msg done";
      MsgIconFaculty.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgFaculty.innerHTML = "Please select faculty.";
      MsgBoxFaculty.className = "validation-msg error";
      MsgIconFaculty.innerHTML = "error";
    } else {
      MsgFaculty.innerHTML = "กรุณาเลือกคณะ";
      MsgBoxFaculty.className = "validation-msg error";
      MsgIconFaculty.innerHTML = "error";
    }
  }
}

function CheckSelectIns() {
  var Ins = document.getElementById("Ins");
  var MsgBoxIns = document.getElementById("MsgBoxIns");
  var MsgIns = document.getElementById("MsgIns");
  var MsgIconIns = document.getElementById("MsgIconIns");
  if (Ins.value != "") {
    MsgBoxIns.style.display = "flex";
    if (lang == "en") {
      MsgIns.innerHTML = "The institution has been selected.";
      MsgBoxIns.className = "validation-msg done";
      MsgIconIns.innerHTML = "done";
    } else {
      MsgIns.innerHTML = "เลือกสถาบันเรียบร้อย";
      MsgBoxIns.className = "validation-msg done";
      MsgIconIns.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgIns.innerHTML = "Please select an institution.";
      MsgBoxIns.className = "validation-msg error";
      MsgIconIns.innerHTML = "error";
    } else {
      MsgIns.innerHTML = "กรุณาเลือกสถาบัน";
      MsgBoxIns.className = "validation-msg error";
      MsgIconIns.innerHTML = "error";
    }
  }
}

function CheckSelectAuthor() {
  var Author = document.getElementById("Author");
  var MsgBoxAuthor = document.getElementById("MsgBoxAuthor");
  var MsgAuthor = document.getElementById("MsgAuthor");
  var MsgIconAuthor = document.getElementById("MsgIconAuthor");
  if (Author.value != "") {
    MsgBoxAuthor.style.display = "flex";
    if (lang == "en") {
      MsgAuthor.innerHTML = "The Author has been selected.";
      MsgBoxAuthor.className = "validation-msg done";
      MsgIconAuthor.innerHTML = "done";
    } else {
      MsgAuthor.innerHTML = "เลือกผู้เขียนเรียบร้อย";
      MsgBoxAuthor.className = "validation-msg done";
      MsgIconAuthor.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgAuthor.innerHTML = "Please select an Author.";
      MsgBoxAuthor.className = "validation-msg error";
      MsgIconAuthor.innerHTML = "error";
    } else {
      MsgAuthor.innerHTML = "กรุณาเลือกผู้เขียน";
      MsgBoxAuthor.className = "validation-msg error";
      MsgIconAuthor.innerHTML = "error";
    }
  }
}

function CheckSelectAdvisor() {
  var Advisor = document.getElementById("Advisor");
  var MsgBoxAdvisor = document.getElementById("MsgBoxAdvisor");
  var MsgAdvisor = document.getElementById("MsgAdvisor");
  var MsgIconAdvisor = document.getElementById("MsgIconAdvisor");
  if (Advisor.value != "") {
    MsgBoxAdvisor.style.display = "flex";
    if (lang == "en") {
      MsgAdvisor.innerHTML = "The Advisor has been selected.";
      MsgBoxAdvisor.className = "validation-msg done";
      MsgIconAdvisor.innerHTML = "done";
    } else {
      MsgAdvisor.innerHTML = "เลือกที่ปรึกษาเรียบร้อย";
      MsgBoxAdvisor.className = "validation-msg done";
      MsgIconAdvisor.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgAdvisor.innerHTML = "Please select an Advisor.";
      MsgBoxAdvisor.className = "validation-msg error";
      MsgIconAdvisor.innerHTML = "error";
    } else {
      MsgAdvisor.innerHTML = "กรุณาเลือกที่ปรึกษา";
      MsgBoxAdvisor.className = "validation-msg error";
      MsgIconAdvisor.innerHTML = "error";
    }
  }
}

function CheckSelectApprover() {
  var Approver = document.getElementById("Approver");
  var MsgBoxApprover = document.getElementById("MsgBoxApprover");
  var MsgApprover = document.getElementById("MsgApprover");
  var MsgIconApprover = document.getElementById("MsgIconApprover");
  if (Approver.value != "") {
    MsgBoxApprover.style.display = "flex";
    if (lang == "en") {
      MsgApprover.innerHTML = "The Approver has been selected.";
      MsgBoxApprover.className = "validation-msg done";
      MsgIconApprover.innerHTML = "done";
    } else {
      MsgApprover.innerHTML = "เลือกผู้อนุมัติเรียบร้อย";
      MsgBoxApprover.className = "validation-msg done";
      MsgIconApprover.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgApprover.innerHTML = "Please select an Approver.";
      MsgBoxApprover.className = "validation-msg error";
      MsgIconApprover.innerHTML = "error";
    } else {
      MsgApprover.innerHTML = "กรุณาเลือกผู้อนุมัติ";
      MsgBoxApprover.className = "validation-msg error";
      MsgIconApprover.innerHTML = "error";
    }
  }
}

function CheckSelectProjectType() {
  var ProjectType = document.getElementById("ProjectType");
  var MsgBoxProjectType = document.getElementById("MsgBoxProjectType");
  var MsgProjectType = document.getElementById("MsgProjectType");
  var MsgIconProjectType = document.getElementById("MsgIconProjectType");
  if (ProjectType.value != "") {
    MsgBoxProjectType.style.display = "flex";
    if (lang == "en") {
      MsgProjectType.innerHTML = "The ProjectType has been selected.";
      MsgBoxProjectType.className = "validation-msg done";
      MsgIconProjectType.innerHTML = "done";
    } else {
      MsgProjectType.innerHTML = "เลือกประเภทโครงงานเรียบร้อย";
      MsgBoxProjectType.className = "validation-msg done";
      MsgIconProjectType.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgProjectType.innerHTML = "Please select an ProjectType.";
      MsgBoxProjectType.className = "validation-msg error";
      MsgIconProjectType.innerHTML = "error";
    } else {
      MsgProjectType.innerHTML = "กรุณาเลือกประเภทโครงงาน";
      MsgBoxProjectType.className = "validation-msg error";
      MsgIconProjectType.innerHTML = "error";
    }
  }
}

function CheckSelectMajor() {
  var Major = document.getElementById("Major");
  var MsgBoxMajor = document.getElementById("MsgBoxMajor");
  var MsgMajor = document.getElementById("MsgMajor");
  var MsgIconMajor = document.getElementById("MsgIconMajor");
  if (Major.value != "") {
    MsgBoxMajor.style.display = "flex";
    if (lang == "en") {
      MsgMajor.innerHTML = "The Major has been selected.";
      MsgBoxMajor.className = "validation-msg done";
      MsgIconMajor.innerHTML = "done";
    } else {
      MsgMajor.innerHTML = "เลือกสาขาวิชาเรียบร้อย";
      MsgBoxMajor.className = "validation-msg done";
      MsgIconMajor.innerHTML = "done";
    }
  } else {
    if (lang == "en") {
      MsgMajor.innerHTML = "Please select an Major.";
      MsgBoxMajor.className = "validation-msg error";
      MsgIconMajor.innerHTML = "error";
    } else {
      MsgMajor.innerHTML = "กรุณาเลือกสาขาวิชา";
      MsgBoxMajor.className = "validation-msg error";
      MsgIconMajor.innerHTML = "error";
    }
  }
}
