function logout() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./logout_process.php", true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      alert("로그아웃되었습니다.");
      window.location.href = "index.php";
    }
  }
  xhr.send();
}