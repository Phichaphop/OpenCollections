function CheckInsertProject() {
  var Title = document.getElementById("Title");
  var Author = document.getElementById("Author");
  var ProjectType = document.getElementById("ProjectType");
  var Major = document.getElementById("Major");
  var Abstract = document.getElementById("Abstract");
  var DDate = document.getElementById("Date");
  var ProjectFile = document.getElementById("ProjectFile");
  var Draft = document.getElementById("Draft");
  
    if (Title.value != "") {
      if (Author.value != "") {
        if (ProjectType.value != "") {
          if (Major.value != "") {
            if (Abstract.value != "") {
              if (DDate.value != "") {
                if (ProjectFile.files.length > 0) {
                  Draft.disabled = false;
                  Draft.classList = "btn-pr";
                } else {
                  Draft.disabled = true;
                  Draft.classList = "btn-se";
                }
              } else {
                Draft.disabled = true;
                Draft.classList = "btn-se";
              }
            } else {
              Draft.disabled = true;
              Draft.classList = "btn-se";
            }
          } else {
            Draft.disabled = true;
            Draft.classList = "btn-se";
          }
        } else {
          Draft.disabled = true;
          Draft.classList = "btn-se";
        }
      } else {
        Draft.disabled = true;
        Draft.classList = "btn-se";
      }
    } else {
      Draft.disabled = true;
      Draft.classList = "btn-se";
    }
}

function CheckUpdateProjectCover() {
  var Pic = document.getElementById("Pic");
  var Update = document.getElementById("Update");

  if (Pic.files.length > 0) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}
function CheckUpdateProjectFile() {
  var ProjectFile = document.getElementById("ProjectFile");
  var Update = document.getElementById("Update");

  if (ProjectFile.files.length > 0) {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}
function CheckUpdateProjectDetail() {
  var Title = document.getElementById("Title");
  var Author = document.getElementById("Author");
  var ProjectType = document.getElementById("ProjectType");
  var Major = document.getElementById("Major");
  var Abstract = document.getElementById("Abstract");
  var DDate = document.getElementById("Date");
  var Update = document.getElementById("Update");

  if (Title.value != "") {
    if (Author.value != "") {
      if (ProjectType.value != "") {
        if (Major.value != "") {
          if (Abstract.value != "") {
            if (DDate.value != "") {
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
function CheckUpdateProjectNote() {
  var Note = document.getElementById("Note");
  var Update = document.getElementById("Update");

  if (Note.value != "") {
    Update.disabled = false;
    Update.classList = "btn-pr";
  } else {
    Update.disabled = true;
    Update.classList = "btn-se";
  }
}
