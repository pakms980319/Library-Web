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

    <link rel="stylesheet" href="./css/style_common.css">
    <link rel="stylesheet" href="./css/style_common_layout.css">
    <link rel="stylesheet" href="./css/style_header.css">
    <link rel="stylesheet" href="./css/style_main.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
    <script type="text/javascript" src="./javascript/board.js"></script>
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
        

        <!-- main 시작 ================================================================================================================================ -->
        <div id="main">
        <iframe
        src="https://www.chatbase.co/chatbot-iframe/flUhYzV_H_FywJudsufJ8"
        width="100%"
        style="height: 75%; min-height: 700px"
        frameborder="0"
        ></iframe>

        </div>
        <!-- main 끝 ================================================================================================================================ -->



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