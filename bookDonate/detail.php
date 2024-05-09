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
    <link rel="stylesheet" href="./css/style_detail.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
    <script src="./js/book.js"></script>
</head>
<body>

<style>
    .detail-title {
        color: #009879;
        border-bottom: 2px solid #009879;
        display: inline-block;
        margin-bottom: 15px;
        padding-bottom: 5px;
    }

    .book-info-list {
        border: 1px solid #e0e0e0;
        background-color: #f8f8f8;
        border-radius: 5px;
        padding: 15px;
        list-style-type: none;
    }

    .book-info-list .dataList {
        height: 50px;
        padding: 8px 15px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 18px;
        line-height: 30px;
    }

    .book-info-list .dataList:last-child {
        border-bottom: none;
    }

    button {
        background-color: #009879;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        margin-top: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #007660;
    }

    button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>

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
                                <a class="nav-link" href="./chat/chatbot.php">도서관 챗봇</a>
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

        <script src="./js/logout.js"></script>
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

        <style>
@media (max-width: 490px) {/* 모바일에 대한  스타일 */
    .book-info-list {
    width: 100%;
    }
}
</style>

    <div id="main" style="height: 100%;">
        <?php
        $id_num = $_GET['id'];

        // 책 정보 가져오기
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id_num = ?");
        $stmt->execute([$id_num]);
        $bookInfo = $stmt->fetch();
        if($bookInfo): // 유효성 확인
            ?>
            <div id="main-center-center">
                <div id="bookDetail">
                    <h2 class="detail-title">상세정보</h2>
                    <ul class="book-info-list">
                        <li class="dataList" style="height: 100%;">
                            <img src="../img/<?= $bookInfo['image_path'] ?>" alt="표지" style="width: 200px; height: 300px; object-fit: contain;">
                        </li>
                        <li class="dataList">제목: <?= $bookInfo['title'] ?></li>
                        <li class="dataList">저자: <?= $bookInfo['author'] ?></li>
                        <li class="dataList">출판사: <?= $bookInfo['publisher'] ?></li>
                        <li class="dataList">출판년도: <?= $bookInfo['publication_year'] ?></li>
                        <li class="dataList">장르: <?= $bookInfo['genre'] ?></li>
                        <li class="dataList">대출횟수: <?= $bookInfo['loan_count'] ?></li>
                        <li class="dataList">대출가능여부: <?= $bookInfo['availability'] ? '가능' : '불가' ?></li>
                        <li class="dataList">ISBN: <?= $bookInfo['isbn'] ?></li>
                    </ul>
                    <?php
                    $stmt2 = $pdo->prepare("SELECT * FROM donations WHERE ISBN = ?");
                    $stmt2->execute([$bookInfo['isbn']]);
                    $book = $stmt2->fetch();
                    if($book['donor_name'] == $_SESSION['user_name']):
                        ?>
                        <button id="cancel-button" onclick="cancelButton(<?= $book['ISBN'] ?>)">기부철회</button>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        <?php
        else:
            ?>
            <a href="./donate.php">
                기부목록으로 돌아가기
            </a>

        <?php
        endif;
        ?>
            <script src="./js/bookDetail.js"></script>
            <script src="./javascript/board.js"></script>
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