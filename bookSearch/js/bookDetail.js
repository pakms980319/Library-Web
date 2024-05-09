function logout() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../login/logout_process.php", true);

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      alert("로그아웃되었습니다.");
      window.location.href = "../index.php";
    }
  }
  xhr.send();
}


// 대출 버튼 클릭 시 동작
function loanBook(isbn) {
  const formData = new FormData();
  formData.append('isbn', isbn);

  // AJAX 사용하여 서버에 데이터 전송
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./loan_process.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.success) {
        alert("도서 대출이 완료되었습니다.");
        // 화면 새로고침
        location.reload();
      } else {
        alert(response.message);
      }
    }
  }

  xhr.send(formData);
}

function returnBook(isbn) {
  const formData = new FormData();
  formData.append('isbn', isbn);

  // AJAX 사용하여 서버에 데이터 전송
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./return_process.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.success) {
        alert("도서 반납이 완료되었습니다.");
        // 화면 새로고침
        location.reload();
      } else {
        alert(response.message);
      }
    }
  }

  xhr.send(formData);
}