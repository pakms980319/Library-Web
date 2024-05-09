function login() {
  var id = document.getElementById("loginId").value;
  var password = document.getElementById("loginPassword").value;
  var isLoggedIn = 0; // 로그인 상태를 나타내는 변수, 초기값은 0으로 설정

  if (id == "") {
    alert("아이디를 입력하세요.");
    return;
  }
  if (password == "") {
    alert("비밀번호를 입력하세요.");
    return;
  }

  var formData = new FormData();
  formData.append('id', id);
  formData.append('password', password);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./login_process.php", true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      console.log(this.responseText);
      var response = JSON.parse(this.responseText);

      if (response.success) {
        alert("로그인이 성공적으로 완료되었습니다.");
        window.location.href = "../index.php";
        localStorage.setItem("loggedInToken", JSON.stringify({ id: id, name: response.name }));
      } else {
        alert(response.message);
        document.getElementById("loginId").value = "";
        document.getElementById("loginPassword").value = "";
      }
    }
  }

  xhr.send(formData);
}

