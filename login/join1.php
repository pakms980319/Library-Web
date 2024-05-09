<?php
include '../config.php';

// 세션 시작
session_start();

$loggedIn = false;

// 세션에 user_id가 존재하면 로그인 상태로 판단
if (isset($_SESSION['user_id'])) {
    $loggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시민 도서관 웹페이지</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional JavaScript; jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/join1.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
</head>
<body>
    <div id="body-wrap">

        <!-- header 시작 ================================================================================================================================ -->
        <div id="header">

            <div id="mobile-header-section">
                <nav class="navbar navbar-expand-lg" style="width: 100%;">

                    <!-- Logo -->
                    <a class="navbar-brand" href="../index.php">
                        <img src="./img/main_logo2.png" alt="시민 도서관" width="150" height="55">
                    </a>

                    <!-- Toggler/collapsible Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../chat/chat.php">채팅창</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../login/mypage.php">마이페이지</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../seat/seat.php">편의시설</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../bookDonate/donate.php">헌책기부</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../chat/chatbot.php">도서관 챗봇</a>
                            </li>
                            <?php if ($loggedIn): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="logout()">LOGOUT</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../login/join+login.php">LOGIN</a>
                                </li>
                            <?php endif; ?>
                            <!-- 추가적인 메뉴 항목들을 넣을 수 있습니다. -->
                        </ul>
                    </div>
                </nav>
            </div>


            <div id="header_logo">
                <a href="../index.php">
                    <!-- 이미지 출처: https://kr.lovepik.com/download/detail/450005420 -->
                    <img src="./img/main_logo2.png" alt="시민 도서관">
                </a>
            </div>

            <!-- header_menu_top 시작 ================================================================================================================================ -->
            <div id="header_menu_top">
                <ul>
                    <?php if ($loggedIn): ?>
                        <li><img src="./img/main_menu_icon4.png" alt="LOGOUT" onclick="logout()" style="cursor: pointer;"></li>
                    <?php else: ?>
                        <li><a href="../login/join+login.php"><img src="./img/main_menu_icon1.png" alt="LOGIN"></a></li>
                    <?php endif; ?>
                    <li>
                        <a href="../index.php">
                            <img src="./img/main_menu_icon2.png" alt="HOME">
                        </a>
                    </li>
                    <li>
                        <a href="https://library.daegu.go.kr/jungang/index.do">
                            <img src="./img/main_menu_icon3.png" alt="중앙도서관">
                        </a>
                    </li>

                </ul>
            </div>
            <!-- header_menu_top 끝 ================================================================================================================================ -->

            <script src="./javascript/logout.js"></script>
            <!-- header_menu 시작 ================================================================================================================================ -->
            <div id="header_menu">
                <ul>
                    <li>
                        <a href="../chat/chat.php">
                            <img src="./img/main_menu1.png" alt="채팅창">
                        </a>
                    </li>
                    <li>
                        <a href="../login/mypage.php">
                            <img src="./img/main_menu2.png" alt="마이페이지">
                        </a>
                    </li>
                    <li>
                        <a href="../seat/seat.php">
                            <img src="./img/main_menu3.png" alt="편의시설">
                        </a>
                    </li>
                    <li>
                        <a href="../bookDonate/donate.php">
                            <img src="./img/main_menu4.png" alt="헌책기부">
                        </a>
                    </li>
                </ul>
            </div>
            <!-- header_menu 끝 ================================================================================================================================ -->
            <hr>


        </div>
        <!-- header 끝 ================================================================================================================================ -->
                    
        <!-- main 회원가입-약관동의================================================================================================================================ -->
      
        <div id="main">
       
                    
                    <div id="join_agree">
                        <h1>회원가입</h1><br>
                        <form name="f">
                        <h2>약관 동의</h2>
                        <h4>본 약관은 시민 도서관 웹사이트가 제공하는 모든 서비스(이하 "서비스")의 이용조건 및 절차, 이용자와 사이트의 권리, 의무, 책임사항과 기타 제반 사항을 규정함을 목적으로 합니다.<br><br></h4>
        
                        <h4>가. 수집하는 개인정보의 항목<br></h4>
                        첫째, '시민 도서관' 웹 사이트는 회원가입, 각종 서비스의 제공을 위해 최초 회원가입 당시 아래와 같은 최소한의 개인정보를 필수항목으로 수집하고 있습니다.<br>
                        회원가입<br>
                        - 이름, 아이디, 비밀번호, E-mail, 전화번호<br><br>

                        본 약관에서 사용하는 용어의 정의는 다음과 같습니다.<br>
                        가입: 사이트가 제공하는 신청서 양식에 해당 정보를 기입하고, 본 약관에 동의하여 서비스 이용계약을 완료시키는 행위<br>
                        회원: 사이트에 회원가입에 필요한 개인 정보를 제공하여 회원 등록을 한 자로서, 사이트의 정보 및 서비스를 이용할 수 있는 자<br>
                        아이디(ID): 이용자의 식별과 이용자가 서비스 이용을 위하여 이용자가 정하고 사이트가 승인하는 문자와 숫자의 조합<br>
                        비밀번호(PW): 이용자가 등록회원과 동일인인지 신원을 확인하고 통신상의 자신의 개인정보보호를 위하여 이용자 자신이 정한 문자와 숫자의 조합<br><br>
            
                        둘째, 서비스 이용과정이나 처리 과정에서 아래와 같은 정보들이 자동으로 생성되어 수집될 수 있습니다.<br>
                        - IP Address, 쿠키, 방문 일시, 서비스 이용 기록(검색 기록 등)<br><br>
                       
                        <h4>나. 개인정보 수집방법<br></h4>
                        '시민 도서관' 웹 사이트는 다음과 같은 방법으로 개인정보를 수집합니다.<br>
                        - 홈페이지, 이메일<br><br>
                        <div class="checkbox_agree">
                            <h4 id=ag><input type="checkbox" id="agree">
                            <label for="agree" id="agreech">(필수) 위 이용약관에 동의합니다.</label></h4><br>
                      
                        </form>
                        <div>
                            <button id="next" onClick="nextGo(); return false;">다음</button>
                        </div>
                       
                        </div>
                    </div>
                    
            </div>

            <script src="./js/join1.js"></script>
        <!-- footer 시작 ================================================================================================================================ -->
        <div id="footer">


            <div id="footer_in">


                <div id="copyright_btn">
                    <ul>
                        <li><a href="../register/register.html">개인정보처리방침</a></li>
                    </ul>
                </div>


                <div id="copyright">
                    <p class="" style="margin:0; text-align: left; color:#696969; font-size:11px; letter-spacing: 0.7px; line-height: 16px;">
                        XXXXX 경북 경산시 대학로 XXX 시민 도서관  Tel 053-XXX-XXXX Fax 053-XXX-XXXX <br />
                        Copyright (c) <a style="color:#06378d; font-size:11px;" href="mailto:XXX@google.co.kr">시민 도서관</a>. All rights reserved.
                    </p>
                </div>


            </div>


        </div>
        <!-- footer 끝 ================================================================================================================================ -->


    </div>
</body>
</html>