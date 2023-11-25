function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

function setLanguage(lang) {
  setCookie("lang", lang, 365); // บันทึกค่า 'lang' ในคุกกี้ ที่มีอายุ 365 วัน
  window.location.reload(); // รีโหลดหน้าเว็บเพื่อแสดงการเปลี่ยนแปลง
}