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
    <title>시민 도서관 웹페이지 헌책 기부 신청</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional JavaScript; jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/style_common.css">
    <link rel="stylesheet" href="./css/style_common_layout.css">
    <link rel="stylesheet" href="./css/style_header.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/style_table.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
</head>
<style>
    #main_center {
        font-family: Arial, sans-serif;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f8f8f8;
    }

    h3 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    th {
        padding: 10px 20px;
        background-color: #eee;
        border: 1px solid #ddd;
        text-align: center;
    }

    td {
        padding: 10px 20px;
        border: 1px solid #ddd;
        text-align: center;
    }

    #main_center_bottom {
        margin-top: 30px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }


    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        background-color: #009879;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #007660;
    }
</style>
<body>
    <div id="body-wrap">

        <!-- header 시작 ================================================================================================ -->
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
        <!-- header 끝 ================================================================================================ -->


        <!-- main 시작 ================================================================================================== -->
        
        <style>
@media (max-width: 490px) {/* 모바일에 대한  스타일 */
    th, td {
    font-size: 6px;
}
}
</style>
        
        <div id="main" style="height: 100%;">
            
            <div id="main_center">
                <h3>기부현황</h3>
                <hr>
                <div id="main_center_center" style="max-height: 400px; overflow-y: auto;">
                    <table>
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>책 제목</th>
                            <th>기부날짜</th>
                            <th>기부자</th>
                            <th>상세보기</th>
                        </tr>
                        </thead>
                        <tbody id="board-container">
                        <?php
                        // DB에서 데이터 가져오기
                        $stmt = $pdo->prepare("SELECT * FROM donations");
                        $stmt->execute();
                        $books = $stmt->fetchAll();
                        // books 배열에 있는 데이터 출력 foreach문 사용
                        foreach ($books as $book):
                            // ISBN값을 기준으로 books에서 해당 책의 표지도 가져옴
                            $stmt2 = $pdo->prepare("SELECT * FROM books WHERE ISBN = ?");
                            $stmt2->execute([$book['ISBN']]);
                            $book2 = $stmt2->fetch();
    ?>
                            <tr>
                                <td><?= $book['ISBN'] ?></td>
                                <td><a href="./detail.php?id=<?= $book2['id_num'] ?>"><?= $book['title'] ?></a></td>
                                <td><?= substr($book['date_posted'], 0, 10) ?></td>
                                <td><?= $book['donor_name'] ?></td>
                                <td><a href="./detail.php?id=<?= $book2['id_num'] ?>"><img src="../img/search.png" alt="상세보기" style="width: 30px; height: 30px;"></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <form action="./save_process.php" method="post" enctype="multipart/form-data">
                    <div id="main_center_bottom">
                        <hr>
                        <h2>새로운 책 추가</h2>
                        <div>
                            <label for="isbn">ISBN:</label>
                            <input type="text" name="isbn" id="isbn" required>
                        </div>
                        <div>
                            <label for="title">책 제목:</label>
                            <input type="text" name="title" id="title" required>
                        </div>
                        <div>
                            <label for="author">저자:</label>
                            <input type="text" name="author" id="author" required>
                        </div>
                        <div>
                            <label for="publisher">출판사:</label>
                            <input type="text" name="publisher" id="publisher" required>
                        </div>
                        <div>
                            <label for="publication_year">출판년도:</label>
                            <input type="text" name="publication_year" id="publication_year" required>
                        </div>
                        <div>
                            <label for="author">장르:</label>
                            <select name="genre" id="genre">
                                <option value="과학">과학</option>
                                <option value="철학">철학</option>
                                <option value="종교">종교</option>
                                <option value="문학">문학</option>
                                <option value="IT">IT</option>
                                <option value="역사">역사</option>
                                <option value="기타">기타</option>
                            </select>
                        </div>
                        <div>
                            <label for="description">책 설명:</label>
                            <textarea id="description" name="description" rows="4" style="width: 100%;" required></textarea>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label for="cover">책 표지:</label>
                            <input type="file" name="cover" id="cover" accept="image/*" style="width: 100%; padding: 5px; margin-top: 5px;">
                        </div>
                        <div>
                            <button id="add-button">추가</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <script src="./javascript/board.js"></script>
        <!-- main 끝 ================================================================================================== -->

        <!-- footer 시작 ================================================================================================ -->
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
        <!-- footer 끝 ================================================================================================ -->


    </div>
</body>
</html>