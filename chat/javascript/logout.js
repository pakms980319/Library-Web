function logout() {
  var loggedInToken = JSON.parse(localStorage.getItem("loggedInToken"));
  if (loggedInToken && loggedInToken.isLoggedIn === 1) {
    alert("로그아웃되었습니다.");
    loggedInToken.isLoggedIn = 0;
    localStorage.setItem("loggedInToken", JSON.stringify(loggedInToken));
    window.location.href = "../index.html";
  } else {
    alert("이미 로그아웃되었거나 로그인 상태가 아닙니다.");
  }
}