let isDuplicateChecked = false;

function checkDuplicate() { 
  var id = document.getElementById("id").value;
  if (id === "") {
    alert("ID를 입력해주세요.");
    document.getElementById("signup").disabled = true; 
  }

  if (localStorage.getItem(id)) {
    alert("이미 사용 중인 아이디입니다.");
    document.getElementById("id").value = ""; 
    document.getElementById("signup").disabled = true; 

  } else {
    alert("사용 가능한 아이디입니다.");
    document.getElementById("signup").disabled = false; 
    isDuplicateChecked = true;
  }
}

function signup() {
  var name = document.getElementById("name").value;
  var id = document.getElementById("id").value;
  var pw = document.getElementById("password").value;
  var pwch = document.getElementById("passwordch").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var re_idpw = /^[a-zA-Z0-9]{4,16}$/; //id, pw 유효성검사 정규식
  var re_name = /^[가-힣]{2,20}$/; //이름 유효성검사 정규식
  var re_phone = /^\d{3}-\d{4}-\d{4}$/; //전화번호 유효성검사 정규식
  var re_email = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/; //(알파벳,숫자)@(알파벳,숫자).(알파벳,숫자) 이메일 유효성검사 정규식

  if (name == "") {
    alert("이름을 입력하세요.");
    name.focus();
    return;

  }
  if (!re_name.test(name)) {
    alert("이름은 2자이상의 한글로만 입력 가능합니다.");
    document.getElementById("name").value = "";
    return;
  }

  if (id == "") {
    alert("아이디를 입력하세요.");
    id.focus();
    return;
  }
  if (!re_idpw.test(id)) {
    alert("아이디는 4~16자의 대소문자와 숫자로만 입력 가능합니다.")
    document.getElementById("id").value = "";
    return;
  }
  if (isDuplicateChecked == false) {
    alert('아이디 중복 확인을 해주세요.')
    return;
  }
  if (pw == "") {
    alert("비밀번호를 입력하세요.");
    pw.focus();
    return;
  }
  if (!re_idpw.test(pw)) {
    alert("비밀번호는 4~16자의 대소문자와 숫자로만 입력 가능합니다.")
    document.getElementById("password").value = "";
    return;
  }
  if (pwch == "") {
    alert("비밀번호 확인을 입력하세요.");
    pwch.focus();
    return;
  }
  if (pw != pwch) {
    alert("비밀번호와 비밀번호 확인이 동일하지 않습니다.");
    document.getElementById("passwordch").value = "";
    return;
  }

  if (phone == "") {
    alert("전화번호를 입력하세요.");
    phone.focus();
    return;
  }
  if (!re_phone.test(phone)) {
    alert("전화번호 형식에 맞춰 입력해주세요.")
    document.getElementById("phone").value = "";
    return;
  }

  if (email == "") {
    alert("이메일을 입력하세요.");
    email.focus();
    return;
  }

  if (re_email.test(email) == false) {
    alert("입력된 이메일은 잘못된 형식입니다.");
    document.getElementById("email").value = "";
    return;
  }

  var formData = new FormData();
  formData.append('name', name);
  formData.append('id', id);
  formData.append('password', pw);
  formData.append('phone', phone);
  formData.append('email', email);

  // AJAX 사용하여 서버에 데이터 전송
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./signup_process.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.success) {
        alert("회원 가입이 완료되었습니다.");
        document.getElementById("name").value = "";
        document.getElementById("id").value = "";
        document.getElementById("password").value = "";
        document.getElementById("passwordch").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("email").value = "";
        window.location.href = "./join+login.php";
      } else {
        alert(response.message);
      }
    }
  }

  xhr.send(formData);
}