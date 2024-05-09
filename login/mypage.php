<?php
include '../config.php';

// 세션 시작
session_start();

$loggedIn = false;

// 세션에 user_id가 존재하면 로그인 상태로 판단
if (isset($_SESSION['user_id'])) {
    $loggedIn = true;
} else {
    ?>
    <script>
        alert('로그인 후 이용해주시길 바랍니다.');
        window.location.replace('../login/join+login.php')
    </script>
    <?php
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

    <link rel="stylesheet" href="./css/style_main_header.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
</head>
<style>
    /* 스타일 시작 */
    #main {
        font-family: Arial, sans-serif; /* 글꼴 설정 */
        width: 80%; /* 너비 설정 */
        margin: 50px auto; /* 중앙 정렬 */
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* 그림자 효과 */
    }

    #main h1 {
        text-align: center; /* 중앙 정렬 */
        color: #333; /* 글자 색상 */
        margin-bottom: 40px;
    }

    #user-info button {
        display: block;
        margin: 20px auto; /* 중앙 정렬 */
        padding: 10px 15px;
        background-color: #4CAF50; /* 버튼 색상 */
        color: white; /* 글자 색상 */
        border: none;
        cursor: pointer; /* 마우스 오버시 포인터 모양 변경 */
    }

    #user-info button:hover {
        background-color: #45a049; /* 마우스 오버시 버튼 색상 변경 */
    }

    table {
        width: 100%; /* 테이블 너비 설정 */
        border-collapse: collapse; /* 테이블 경계선 합치기 */
    }

    table, th, td {
        border: 1px solid #dddddd; /* 테이블 경계선 설정 */
    }

    th, td {
        text-align: left; /* 좌측 정렬 */
        padding: 8px; /* 내부 여백 */
    }

    th {
        background-color: #f2f2f2; /* 테이블 헤더 배경색 */
    }

    tr:nth-child(even) {
        background-color: #f5f5f5; /* 홀수 줄 배경색 변경 */
    }
    /* 스타일 종료 */
</style>

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


        <!-- main 시작 ================================================================================================================================ -->
        <div id="main" style="height: 100%;">
            <h1>회원정보조회</h1>
            <div id="user-info">
                <button type="submit" onclick="bring_info()">개인정보조회</button>
            </div>
                    <?php
                    // 대출 정보 확인
                    // ISBN을 통해 외래키로 물린 books table에서 title을 가져옴
                    $stmt = $pdo->prepare("SELECT books.title, loan_records.loan_date, loan_records.due_date, loan_records.returned FROM loan_records INNER JOIN books ON loan_records.ISBN = books.ISBN WHERE user_id = ? ORDER BY loan_records.loan_date DESC");
                    $stmt->execute([$_SESSION['id_num']]);

                    $loanRecords = $stmt->fetchAll();
                    if($loanRecords):
                        ?>
                        <h2 style="margin-top: 15px;">대출 정보</h2>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table>
                                <thead>
                                <tr>
                                    <th>도서명</th>
                                    <th>대출일</th>
                                    <th>반납일</th>
                                    <th>대출상태</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($loanRecords as $loanRecord): ?>
                                    <tr>
                                        <td style="color: <?= $loanRecord['returned'] == 0 ? 'black': 'gray'; ?>" ><?= $loanRecord['title'] ?></td>
                                        <td style="color: <?= $loanRecord['returned'] == 0 ? 'black': 'gray'; ?>"><?= $loanRecord['loan_date'] ?></td>
                                        <td style="color: <?= $loanRecord['returned'] == 0 ? 'black': 'gray'; ?>"><?= $loanRecord['due_date'] ?></td>
                                        <td style="color: <?= $loanRecord['returned'] == 0 ? 'black': 'gray'; ?>">
                                            <?php
                                            if($loanRecord['returned'] == 0) {
                                                if(strtotime($loanRecord['due_date']) < strtotime(date("Y-m-d"))) {
                                                    echo "연체중";
                                                } else {
                                                    echo "대출중";
                                                }
                                            } else {
                                                echo "반납완료";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else:
                        ?>
                        <h2 style="margin-top: 15px;">대출 정보</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>도서명</th>
                                <th>대출일</th>
                                <th>반납일</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>대출한 도서가 없습니다.</td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
                    <?php
                    endif;
                    ?>
             <?php
                 // seat_reservations 테이블에 만기 시간이 지난 예약 정보 삭제
                 $stmt = $pdo->prepare("UPDATE seat_reservations SET reserved = 0, user_id = NULL, time_left = NULL WHERE time_left < NOW()");
                 $stmt->execute();

                // 예약 정보 확인
                $stmt = $pdo->prepare("SELECT * from seat_reservations WHERE user_id = ?");
                $stmt->execute([$_SESSION['id_num']]);

                $seatRecords = $stmt->fetchAll();
                if($seatRecords):
                    ?>
                    <h2 style="margin-top: 15px;">좌석 예약 정보</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>열람실</th>
                            <th>좌석 번호</th>
                            <th>잔여시간</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($seatRecords as $seatRecord): ?>
                            <tr>
                                <td><?= $seatRecord['room'] ?></td>
                                <td><?= $seatRecord['seat_index']."번" ?></td>
                                <td><span id="remainingTime">계산중...</span></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        var endTime = new Date("<?php echo $seatRecord['time_left']; ?>").getTime();
                        function updateRemainingTime() {
                            var now = new Date().getTime();
                            var distance = endTime - now;

                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            document.getElementById("remainingTime").innerHTML = hours > 0 ? hours + "시간 " : "" + minutes + "분 " + seconds + "초 ";

                            // 만기 시간이 지나면 서버로 예약 취소 요청
                            if (distance < 0) {
                                clearInterval(x);
                                alert('좌석 예약이 만료되었습니다.');
                                window.location.reload();
                            }
                        }

                        // 1초마다 함수를 호출하여 남은 시간 갱신
                        var x = setInterval(updateRemainingTime, 1000);
                    </script>
                <?php else:
                    ?>
                    <h2 style="margin-top: 15px;">시설 예약 정보</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>열람실</th>
                            <th>좌석 번호</th>
                            <th>잔여시간</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>예약한 시설정보가 없습니다.</td>
                            <td></td>
                            <td></td>
                        </tbody>
                    </table>
                <?php
                endif;
            ?>

            <?php
            // 도서 기부 내역 조회
            $stmt = $pdo->prepare("SELECT * from donations WHERE donor_name = ?");
            $stmt->execute([$_SESSION['user_name']]);

            $donationRecords = $stmt->fetchAll();
            if($donationRecords):
                ?>
                <h2 style="margin-top: 15px;">도서 기부 내역</h2>
                <table>
                    <thead>
                    <tr>
                        <th>도서명</th>
                        <th>기부날짜</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($donationRecords as $donationRecord): ?>
                        <tr>
                            <td><?= $donationRecord['title'] ?></td>
                            <td><?= substr($donationRecord['date_posted'], 0, 10) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else:
                ?>
                <h2 style="margin-top: 15px;">도서 기부 내역</h2>
                <table>
                    <thead>
                    <tr>
                        <th>도서명</th>
                        <th>기부일</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>기부한 도서가 없습니다.</td>
                        <td></td>
                    </tbody>
                </table>
            <?php
            endif;
            ?>

        </div>
          <script src="./js/mypage.js"></script>
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