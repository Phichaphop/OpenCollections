function CheckSelectDept() {
    var Dept = document.getElementById("Dept");
    var MsgDept = document.getElementById("MsgDept");
    if (Dept.value != "") {
      MsgDept.innerHTML = "";
    } else {
      MsgDept.innerHTML = "Please select department.";
    }
  }
  
  function CheckSelectFaculty() {
    var Faculty = document.getElementById("Faculty");
    var MsgFaculty = document.getElementById("MsgFaculty");
    if (Faculty.value != "") {
      MsgFaculty.innerHTML = "";
    } else {
      MsgFaculty.innerHTML = "Please select faculty.";
    }
  }
  
  function CheckSelectAuthor() {
    var Author = document.getElementById("Author");
    var MsgAuthor = document.getElementById("MsgAuthor");
    if (Author.value != "") {
      MsgAuthor.innerHTML = "";
    } else {
      MsgAuthor.innerHTML = "Please enter author.";
    }
  }
  
  function CheckSelectAdvisor() {
    var Advisor = document.getElementById("Advisor");
    var MsgAdvisor = document.getElementById("MsgAdvisor");
    if (Advisor.value != "") {
      MsgAdvisor.innerHTML = "";
    } else {
      MsgAdvisor.innerHTML = "Please enter advisor.";
    }
  }

  function CheckSelectApprover() {
    var Approver = document.getElementById("Approver");
    var MsgApprover = document.getElementById("MsgApprover");
    if (Approver.value != "") {
      MsgApprover.innerHTML = "";
    } else {
      MsgApprover.innerHTML = "Please enter Approver.";
    }
  }
  
  function CheckSelectProjectType() {
    var ProjectType = document.getElementById("ProjectType");
    var MsgProjectType = document.getElementById("MsgProjectType");
    if (ProjectType.value != "") {
      MsgProjectType.innerHTML = "";
    } else {
      MsgProjectType.innerHTML = "Please select project type.";
    }
  }
  
  function CheckSelectMajor() {
    var Major = document.getElementById("Major");
    var MsgMajor = document.getElementById("MsgMajor");
    if (Major.value != "") {
      MsgMajor.innerHTML = "";
    } else {
      MsgMajor.innerHTML = "Please select major";
    }
  }