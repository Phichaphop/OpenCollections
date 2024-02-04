function CheckInsertManual() {
  var Title = document.getElementById("Title");
  var File = document.getElementById("File");
  var Insert = document.getElementById("Insert");

  if (Title.value != "" && File.files.length > 0) {
      Insert.disabled = false;
      Insert.classList = "btn-pr";
    } else {
      Insert.disabled = true;
      Insert.classList = "btn-se";
    }
}

function CheckUpdateDetailManual() {
  var Title = document.getElementById("Title");
  var Update = document.getElementById("Update");

  if ((Title.value != "" && Title.value != DataTitle)) {
      Update.disabled = false;
      Update.classList = "btn-pr";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
    }
}

function CheckUpdateFileManual() {
  var File = document.getElementById("File");
  var Update = document.getElementById("Update");

  if (File.files.length > 0) {
      Update.disabled = false;
      Update.classList = "btn-pr";
    } else {
      Update.disabled = true;
      Update.classList = "btn-se";
    }
}