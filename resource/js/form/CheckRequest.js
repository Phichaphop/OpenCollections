function CheckInsertRequest() {
    var Title = document.getElementById("Title");
    var Detail = document.getElementById("Detail");
    var Insert = document.getElementById("Insert");
    if (Title.value != "" && Detail.value != "") {
      Insert.disabled = false;
      Insert.classList = "btn-pr";
    } else {
      Insert.disabled = true;
      Insert.classList = "btn-se";
    }
  }