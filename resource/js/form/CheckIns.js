function CheckInsertIns() {
  var Pic = document.getElementById("Pic");
  var Name = document.getElementById("Name");
  var Insert = document.getElementById("Insert");
  if (Name.value != "" && Pic.files.length > 0) {
    Insert.disabled = false;
    Insert.classList = "btn-pr";
  } else {
    Insert.disabled = true;
    Insert.classList = "btn-se";
  }
}

function CheckUpdatePicIns() {
  var Pic = document.getElementById("Pic");
  var MsgPic = document.getElementById("MsgPic");
  var Update = document.getElementById("Update");
  if (Pic.files.length > 0) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
    if (lang == "en") {
      MsgPic.innerHTML = "Please select picture.";
    } else {
      MMsgPic.innerHTML = "กรุณาเลือกรูปภาพ";
    }
  }
}

function CheckUpdateDetailIns() {
  var Name = document.getElementById("Name");
  var MsgName = document.getElementById("MsgName");
  var Update = document.getElementById("Update");
  if (Name.value != "") {
    if (Name.value != DataIns) {
      Update.disabled = false;
      Update.classList = "btn-pr";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
      
      if (lang == "en") {
        MsgName.innerHTML = "Same institute";
      } else {
        MsgName.innerHTML = "มีชื่อสถาบันนี้แล้ว";
      }
    }
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}
