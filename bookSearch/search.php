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
    <link rel="stylesheet" href="./css/style_search.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
    <script src="./js/book.js"></script>
</head>
<style>
    /* Basic table styling */
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 18px;
        text-align: left;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #009879;
        color: white;
    }
    .styled-table th, .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: thin solid #dddddd;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr:hover {
        background-color: #f5f5f5;
    }

    /* Link styling within table cells */
    .styled-table td a {
        color: inherit;
        text-decoration: none;
        display: block;
        width: 100%;
        height: 100%;
        transition: background-color 0.3s;
    }
    .styled-table td a:hover {
        background-color: #f5f5f5;
    }
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
    .styled-table {
    
    font-size: 12px;
    
}
}
</style>
        
        <div id="main">
            <div id="main-center-center">
                <form id="SearchQ" method="get" action="search.php">
                    <select id="SrchType" name="SrchType" style="width: 90px; height: 30px;">
                        <option value="ALL">전체</option>
                        <option value="ISBN">ISBN</option>
                        <option value="Publisher">출판사</option>
                        <option value="Author">저자</option>
                        <option value="Title">제목</option>
                        <option value="Topic">장르</option>
                    </select>
                    <input type="text" id="SrchKey" name="SrchKey" placeholder="검색어를 입력하세요." maxlength="100" style="margin:0px; width: 60%; border:1 none; height: 24px">
                    <input type="image" id="search_btn" src="./img/search_icon.png" style="padding-right:20px" alt="검색" align="absmiddle" onclick="document.getElementById('SearchQ').submit();">
                    <select id="SrchSort" name="SrchSort" style="width: 90px; height: 30px" onchange="document.getElementById('SearchQ').submit();">
                        <option value="ASC">오름차순</option>
                        <option value="DESC">내림차순</option>
                    </select>
                </form>
            <script src="./js/search.js"></script>
            </div>
            <div id="main-center-center">
                <h3>검색결과</h3>
                <table class="styled-table">
                    <thead>
                    <tr>
                        <th style="width:40%">제목</th>
                        <th style="width:15%">저자</th>
                        <th style="width:15%">출판사</th>
                        <th style="width:15%">장르</th>
                        <th style="width:15%">ISBN</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // 검색 유형 및 검색어 가져오기
                    $searchType = $_GET['SrchType'] ?? 'ALL';  // 기본값 설정
                    $searchKey = $_GET['SrchKey'];
                    $sortOrder = $_GET['SrchSort'] ?? 'ASC';  // 기본값은 오름차순

                    // 허용된 검색 유형 목록
                    $allowedTypes = ["ALL", "ISBN", "Publisher", "Author", "Title", "Topic"];

                    // 유효한 검색 유형인지 확인
                    if (!in_array($searchType, $allowedTypes)) {
                        die("Invalid search type");
                    }

                    // 쿼리를 동적으로 생성하기 위한 초기 쿼리
                    $query = "SELECT * FROM books";

                    // 검색 유형에 따른 조건 추가
                    if ($searchType !== "ALL") {
                        $query .= " WHERE $searchType LIKE :searchKey";
                    } else {
                        $query .= " WHERE title LIKE :titleKey OR author LIKE :authorKey OR publisher LIKE :publisherKey OR genre LIKE :genreKey OR isbn LIKE :isbnKey";
                    }

                    // 정렬 순서 추가
                    $query .= " ORDER BY title " . $sortOrder;

                    $stmt = $pdo->prepare($query);

                    if ($searchType !== "ALL") {
                        $stmt->bindValue(':searchKey', '%' . $searchKey . '%');
                    } else {
                        $stmt->bindValue(':titleKey', '%' . $searchKey . '%');
                        $stmt->bindValue(':authorKey', '%' . $searchKey . '%');
                        $stmt->bindValue(':publisherKey', '%' . $searchKey . '%');
                        $stmt->bindValue(':genreKey', '%' . $searchKey . '%');
                        $stmt->bindValue(':isbnKey', '%' . $searchKey . '%');
                    }

                    $stmt->execute();

                    $books = $stmt->fetchAll();
                    foreach ($books as $book):
                        ?>
                            <tr>
                                    <td>
                                        <a href="./detail.php?id=<?= $book['id_num']; ?>" style="font-size: medium;"><?= htmlspecialchars($book['title']) ?></a>
                                    </td>
                                    <td><?= htmlspecialchars($book['author']) ?></td>
                                    <td><?= htmlspecialchars($book['publisher']) ?></td>
                                    <td><?= htmlspecialchars($book['genre']) ?></td>
                                    <td><?= htmlspecialchars($book['isbn']) ?></td>
                            </tr>
                    <?php
                    endforeach;
                    ?>
                   </tbody>

                </table>

                <div>
                    <br>
                    <br>
                </div>

                <h3>추천도서</h3>
                <div id="main-center-center">
                    <table class="styled-table">
                        <thead>
                        <tr>
                            <th style="width:40%">제목</th>
                            <th style="width:15%">저자</th>
                            <th style="width:15%">출판사</th>
                            <th style="width:15%">장르</th>
                            <th style="width:15%">ISBN</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php
                        // 대출 기록 기반의 publisher 취향 분석
                        $stmt = $pdo->prepare("SELECT b.publisher, COUNT(*) as count FROM loan_records l INNER JOIN books b ON l.isbn = b.isbn GROUP BY b.publisher");
                        $stmt->execute();
                        $loanPublishers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

                        // 기부 기록 기반의 publisher 취향 분석
                        $stmt = $pdo->prepare("SELECT b.publisher, COUNT(*) as count FROM donations d INNER JOIN books b ON d.isbn = b.isbn GROUP BY b.publisher");
                        $stmt->execute();
                        $donationPublishers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

                        // 대출과 기부 횟수를 합쳐 publisher 우선순위 정의
                        $publisherPriorities = [];
                        foreach ($loanPublishers as $publisher => $count) {
                            $publisherPriorities[$publisher] = $count + (isset($donationPublishers[$publisher]) ? $donationPublishers[$publisher] : 0);
                        }

                        arsort($publisherPriorities);

                        // 대출 기록 기반의 장르 취향 분석
                        $stmt = $pdo->prepare("SELECT b.genre, COUNT(*) as count FROM loan_records l INNER JOIN books b ON l.isbn = b.isbn GROUP BY b.genre");
                        $stmt->execute();
                        $loanGenres = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

                        // 기부 기록 기반의 장르 취향 분석
                        $stmt = $pdo->prepare("SELECT b.genre, COUNT(*) as count FROM donations d INNER JOIN books b ON d.isbn = b.isbn GROUP BY b.genre");
                        $stmt->execute();
                        $donationGenres = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

                        // 대출과 기부 횟수를 합쳐 장르 우선순위 정의
                        $genrePriorities = [];
                        foreach ($loanGenres as $genre => $count) {
                            $genrePriorities[$genre] = $count + (isset($donationGenres[$genre]) ? $donationGenres[$genre] : 0);
                        }

                        arsort($genrePriorities);

                        $books = [];
                        foreach ($genrePriorities as $genre => $count) {
                            $stmt = $pdo->prepare("SELECT * FROM books WHERE genre = ? ORDER BY FIELD(publisher, ?) DESC, loan_count DESC");
                            $stmt->execute([$genre, implode(',', array_keys($publisherPriorities))]);
                            $fetchedBooks = $stmt->fetchAll();

                            $books = array_merge($books, $fetchedBooks);

                            if (count($books) >= 3) {
                                break;
                            }
                        }

                        // 추천도서는 3권으로 제한
                        $books = array_slice($books, 0, 3);

                        $i = 0;
                        foreach ($books as $book):
                            $i++;
                            ?>
                            <tr>
                                <td><a href="./detail.php?id=<?= $book['id_num'] ?>"><?= $book['title'] ?></a></td>
                                <td><?= $book['author'] ?></td>
                                <td><?= $book['publisher'] ?></td>
                                <td><?= $book['genre'] ?></td>
                                <td><?= $book['isbn'] ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
<!--                <div id="pagination"></div>-->
            </div>
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