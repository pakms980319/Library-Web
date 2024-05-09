function bring_info() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./info_process.php", true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);

      if (response.success) {
        var user = response.data;
        var userInfoElement = document.getElementById("user-info");

        userInfoElement.innerHTML =
            "<p>이름: " + user.name + "</p><br>" +
            "<p>아이디: " + user.id + "</p><br>" +
            "<p>전화번호: " + user.phone + "</p><br>" +
            "<p>이메일: " + user.email + "</p><br>";
      } else {
        alert(response.message);
      }
    }
  };

  xhr.send();
}
function findId() {
  var xhr = new XMLHttpRequest();
  var email = document.getElementById("email").value;

  xhr.open("GET", "./findId_process.php?email=" + email, true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);

      if (response.success) {
        var userId = response.data.id;
        var findIdElement = document.getElementById("find-id-result");

        findIdElement.innerHTML = "<p>당신의 아이디는: " + userId + "</p>";
      } else {
        alert(response.message);
      }
    }
  };

  xhr.send();
}
function findPw() {
  var xhr = new XMLHttpRequest();
  var email = document.getElementById("email").value;
  var id = document.getElementById("id").value;

  xhr.open("GET", "./findPw_process.php?email=" + email + "&id=" + id, true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);

      if (response.success) {
        var userPw = response.data.password;
        var findIdElement = document.getElementById("find-pw-result");

        findIdElement.innerHTML = "<p>당신의 비밀번호는: " + userPw + "</p>";
      } else {
        alert(response.message);
      }
    }
  };

  xhr.send();
}
function logout() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./logout_process.php", true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      alert("로그아웃되었습니다.");
      window.location.href = "../index.php";
    }
  }
  xhr.send();
}
