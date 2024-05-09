<?php
include './config.php';

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
    <link rel="stylesheet" href="./css/style_mobile.css">

    <script type="text/javascript" src="./javascript/board.js"></script>
    <script>
window.embeddedChatbotConfig = {
chatbotId: "flUhYzV_H_FywJudsufJ8",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="flUhYzV_H_FywJudsufJ8"
domain="www.chatbase.co"
defer>
</script>
</head>
<style>
    /* 기본 스타일 */
    .carousel-item {
        height: 300px;
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-caption {
        left: 20% !important;
        right: auto !important;
        top: 40% !important; /* 텍스트를 상위 30% 위치에 둡니다. */
        transform: translateX(-20%) translateY(-30%); /* 텍스트 위치를 조정합니다. */
        text-align: left;
    }

    .carousel-caption h5 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #fff;
    }

    .carousel-caption p {
        font-size: 1rem;
        color: #fff;
    }

    .carousel-caption div {
        font-size: 1rem;
        color: #fff;
        background-color: transparent;
        border: 1px solid #fff;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .carousel-caption div:hover {
        transition: .5s;
        background-color: #fff;
        color: #000;
        font-weight: bold;
        opacity: .7;
    }

    /* 모바일 화면에 대한 스타일 */
    @media (max-width: 768px) {

        .carousel-caption {
            left: 50% !important;             /* 텍스트를 좌측에서 50% 위치에 둡니다. */
            right: auto !important;
            top: 60% !important;             /* 텍스트를 상단에서 60% 위치에 둡니다. */
            transform: translateX(-50%) translateY(-50%); /* 텍스트 위치를 중앙으로 조정합니다. */
            text-align: center;              /* 텍스트를 중앙 정렬합니다. */
        }
        .carousel-caption h5 {
            font-size: 14px;
        }
        .carousel-caption p {
            font-size: 12px;
        }
        .carousel-caption div {
            display: none;
        }
    }


</style>
<body>
    <div id="body-wrap">

        <!-- header 시작 ================================================================================================================================ -->
        <div id="header">

            <div id="mobile-header-section">
                <nav class="navbar navbar-expand-lg" style="width: 100%;">

                    <!-- Logo -->
                    <a class="navbar-brand" href="./index.php">
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
                                <a class="nav-link" href="./chat/chat.php">채팅창</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./login/mypage.php">마이페이지</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./seat/seat.php">편의시설</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./bookDonate/donate.php">헌책기부</a>
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
                                    <a class="nav-link" href="./login/join+login.php">LOGIN</a>
                                </li>
                            <?php endif; ?>
                            <!-- 추가적인 메뉴 항목들을 넣을 수 있습니다. -->
                        </ul>
                    </div>
                </nav>
            </div>


            <div id="header_logo">
                <a href="./index.php">
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
                    <li><a href="./login/join+login.php"><img src="./img/main_menu_icon1.png" alt="LOGIN"></a></li>
                    <?php endif; ?>
                    <li>
                        <a href="./index.php">
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
                        <a href="./chat/chat.php">
                            <img src="./img/main_menu1.png" alt="채팅창">
                        </a>
                    </li>
                    <li>
                        <a href="./login/mypage.php">
                            <img src="./img/main_menu2.png" alt="마이페이지">
                        </a>
                    </li>
                    <li>
                        <a href="./seat/seat.php">
                            <img src="./img/main_menu3.png" alt="편의시설">
                        </a>
                    </li>
                    <li>
                        <a href="./bookDonate/donate.php">
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
            

            <!-- main_top 시작 ================================================================================================================================ -->
            <div id="main_top">
                <!-- main_flash 시작 ================================================================================================================================ -->
                    <!-- 이미지 출처: https://namu.wiki/w/%EB%8F%84%EC%84%9C%EA%B4%80 -->
                    <div id="main_flash" class="carousel slide" data-ride="carousel" style="width: 100%;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="./chat/chat.php">
                                    <img src="./img/main_top_slice1.png" alt="Slide 1" class="w-100">
                                    <div class="carousel-caption">
                                        <h5>채팅방</h5>
                                        <p>사용자들과 여러 의견을 나눌수 있는 채팅방입니다.</p>
                                        <div>
                                            자세히 보기 &gt;
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="./seat/seat.php">
                                    <img src="./img/main_top_slice2.png" alt="Slide 2" class="w-100">
                                    <div class="carousel-caption">
                                        <h5>시설 예약</h5>
                                        <p>도서관 내 여러 시설들을 예약할 수 있습니다.</p>
                                        <div>
                                            자세히 보기 &gt;
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="./bookDonate/donate.php">
                                    <img src="./img/main_top_slice3.png" alt="Slide 3" class="w-100">
                                    <div class="carousel-caption">
                                        <h5>헌책 기부</h5>
                                        <p>더이상 읽지 않는 책이 있다면 기부를 해보는건 어떨까요?</p>
                                        <div>
                                            자세히 보기 &gt;
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#main_flash" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#main_flash" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- main_flash 끝 ================================================================================================================================ -->


            </div>
            <!-- main_top 끝 ================================================================================================================================ -->


            <!-- main_center 시작 ================================================================================================================================ -->
            
            <style>
                            /* 태블릿 스타일: 601px ~ 980px 화면 크기 */
@media only screen and (min-width: 769px) and (max-width: 980px) {
    .main-center-center {
    left:35px
    
}
}

@media (min-width: 601px) and (max-width: 768px) {
                        /* main_center에 대한 스타일 */
#main_center {
    position: absolute;
    left: 0;
    top: 305px;
    width: 90%; /* 변경: 모바일 화면에서 가득 차도록 */
    max-width: 980px; /* 변경: 최대 너비 설정 */
    height: 85px;
    z-index: 30;
    background-color: rgba(102, 102, 82, 0.15);
}

/* main-center-center에 대한 스타일 */
.main-center-center {
    float: none; /* 변경: 더 이상 좌우로 떨어지지 않도록 */
    position: relative;
    width: 100%; /* 변경: 모바일 화면에서 가득 차도록 */
    height: auto; /* 변경: 내용에 따라 높이 조정 */
    margin: 0; /* 변경: 여백 제거 */
    padding: 0; /* 변경: 여백 제거 */
}

/* TabmenuEDS01에 대한 스타일 */
#TabmenuEDS01 {
    width: 100%;
    max-width: none; /* 변경: 최대 너비 해제 */
    position: relative;
    z-index: 1;
    border: 2.5px solid red;
    background-color: white;
    margin: 0 auto;
}

/* title에 대한 스타일 */
#TabmenuEDS01 .title {
    width: 100%;
    padding: 4px;
    box-sizing: border-box;
    display: flex;
    flex-wrap: wrap; /* 변경: 작은 화면에서 넘치면 다음 라인으로 이동 */
    justify-content: space-between;
}

/* title 내 li에 대한 스타일 */
#TabmenuEDS01 .title li {
    flex: 1;
}

/* tab_bg에 대한 스타일 */
#TabmenuEDS01 .tab_bg {
    height: auto; /* 변경: 내용에 따라 높이 조정 */
    padding: 3px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
}

/* ul에 대한 스타일 */
#TabmenuEDS01 ul {
    padding: 5px 0 0 2px;
    box-sizing: border-box;
    width: 100%; /* 변경: 가득 차도록 */
}

/* 기타 스타일 초기화 */
div, p, ul, li, form {
    margin: 0;
    padding: 0;
}

ul, li {
    list-style-type: none;
    line-height: 18px;
}

/* 기타 스타일 초기화 (계속) */
*, ::after, ::before {
    box-sizing: border-box;
}
    }

    @media (max-width: 474px) {
                    /* #main_bottom에 대한 기본 스타일 */
#main_center .search_btn {
    display:none;
}
                }
    @media (max-width: 430px) {
                    /* #main_bottom에 대한 기본 스타일 */
#main_center {
    height: 110px;
}
#TabmenuEDS01 {
    height: 110px;
}
.search_box {
    position: absolute;
    top:32px;
}

                }

            </style>
            
            <div id="main_center">


                <!-- 검색창 -->
                <!-- main_center_center 시작 ================================================================================================================================ -->
                <div class="main-center-center">


                    <div id="TabmenuEDS01">
                        <ul class="title">
                            <li><img src="./img/tab_icon1.png" alt="도서검색" style="border-radius: 10%; cursor: pointer;" onclick="document.getElementById('SearchQ').submit()"></li>
                        </ul>

                        <!-- 도서검색 시작 -->
                        <div class="tab_bg">
                            <ul style="clear:both; ">
                                <form type="text" id="SearchQ" method="get" action="./bookSearch/search.php">
                                    <li class="search_box">
                                        <select id="SrchType" name="Srchtype" style="width: 90px; height: 34px; top: 14px">
                                            <option value="ALL">전체</option>
                                            <option value="ISBN">ISBN</option>
                                            <option value="Publisher">출판사</option>
                                            <option value="Author">저자</option>
                                            <option value="Title">제목</option>
                                            <option value="Topic">장르</option>
                                        </select>
                                        <label>
                                            <input type="text" id="SrchKey" name="SrchKey" placeholder="검색어를 입력하세요." code="" maxlength="100" style="ime-mode:active; width:310px; border: 1px solid black; height: 32px ">
                                        </label>
                                        <!-- 이미지 출처: https://kor.pngtree.com/ -->
                                        <input type="image" class="search_btn" src="./img/search.png" width="39" height="39" alt="검색" align="absmiddle" onclick="document.getElementById('SearchQ').submit()">
                                    </li>
                                </form>
                            </ul>
                        </div>
                        <!-- 도서검색 끝 -->
                    </div>


                </div>
                <!-- main_center_center 끝 ================================================================================================================================ -->


            </div>
            <!-- main_center 끝 ================================================================================================================================ -->


            <!-- main_bottom 시작 ================================================================================================================================ -->
            
            <style>
                

                
                @media (max-width: 768px) {
                    /* #main_bottom에 대한 기본 스타일 */
#main_bottom {
    position: absolute;
    left: 0px;
    top: 420px; /* 필요한 경우 이 값을 조정하세요 */
    width: 100%;
    height: 180px;
    text-align: left;
}

/* #main_bottom 내부 요소들에 대한 기본 스타일 */
#main_bottom #graph,
#main_bottom #tabgroup,
#main_bottom #tabgroup2 {
    position: relative; /* 상대 위치 사용 */
    width: 100%;
    margin-bottom: 20px;
    padding: 20px;
    box-sizing: border-box;
}
#main_bottom #graph {
    right: 22px;
}
#main_bottom #tabgroup {
    left: 5px;
}
                }

                @media (max-width: 380px) {
                    /* #main_bottom에 대한 기본 스타일 */
#main_bottom {
    position: absolute;
    left: 0px;
    top: 400px; /* 필요한 경우 이 값을 조정하세요 */
    width: 100%;
    height: 180px;
    text-align: left;
}
                }
                </style>

            <div id="main_bottom">


                <!-- 대출 통계 그래프 시작 -->
                <div id="graph">
                    <h2>
                        <img src="./img/main_center_menu1.png" alt="통계 그래프">
                    </h2>
                    <select name="graph_menu" id="graph_menu">
                        <option value="graph_img1">막대</option>
                        <option value="graph_img2">꺽은선</option>
                    </select>
                    <div id="graph_img1" class="graphSelect" style="display: block">
                        <div id="container" style="width: 234px; height: 150px;"></div>
                    </div>
                    <div id="graph_img2" class="graphSelect" style="display: none">
                        <div id="lineChartContainer" style="width: 234px; height: 150px;"></div>
                    </div>

                    <script>
                        <?php
                        $stmt = $pdo->prepare("SELECT * FROM books where availability=0");
                        $stmt->execute();
                        $books = $stmt->fetchAll();
                        $science = 0;
                        $philosophy = 0;
                        $religion = 0;
                        $literature = 0;
                        $it = 0;
                        $history = 0;

                        // books 배열에서 각각의 장르에 맞게 몇권의 책이 대출중인지 카운트

                        foreach ($books as $book):
                            if ($book['genre'] == '과학') {
                                $science++;
                            } elseif ($book['genre'] == '철학') {
                                $philosophy++;
                            } elseif ($book['genre'] == '종교') {
                                $religion++;
                            } elseif ($book['genre'] == '문학') {
                                $literature++;
                            } elseif ($book['genre'] == 'IT') {
                                $it++;
                            } elseif ($book['genre'] == '역사') {
                                $history++;
                            }
                        endforeach;
                        ?>
                        document.addEventListener('DOMContentLoaded', function () {
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: null
                                },
                                xAxis: {
                                    categories: ['과학', '철학', '종교', '문학', 'IT', '역사'],
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: null
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                series: [{
                                    data: [<?= $science ?>, <?= $philosophy ?>, <?= $religion ?>, <?= $literature ?>, <?= $it ?>, <?= $history ?>]
                                }]
                            });

                            // 새로운 꺾은선 그래프 코드
                            Highcharts.chart('lineChartContainer', {
                                chart: {
                                    type: 'line'
                                },
                                title: {
                                    text: null
                                },
                                xAxis: {
                                    categories: ['과학', '철학', '종교', '문학', 'IT', '역사'],
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: null
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                series: [{
                                    data: [<?= $science ?>, <?= $philosophy ?>, <?= $religion ?>, <?= $literature ?>, <?= $it ?>, <?= $history ?>]
                                }]
                            });
                        });



                    </script>
                    <script src="./javascript/graphSelect.js"></script>
                </div>
                <!-- 대출 통계 그래프 끝 -->


                <!-- 공지사항 시작 -->
                <div id="tabgroup">
                    <h2 class="tabtit" style="position:absolute;">
                        <a href="./board/board.php">
                            <img src="./img/main_bottom_logo2.png" alt="공지사항">
                        </a>
                    </h2>
                    <div id="list">
                        <ul class="list">
                            <ul id="notice">
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM board ORDER BY id_num DESC LIMIT 5");
                                $stmt->execute();
                                $boards = $stmt->fetchAll();

                                // 아래 js 코드와 똑같은 tag 추가
                                // 값이 없다면, 게시판 정보가 없다는 내용을 출력
                                if (count($boards) == 0):
                                ?>
                                <li>
                                    <a href="">게시판 정보가 없습니다.</a>
                                    <span class="date"></span>
                                </li>
                                <?php
                                endif;
                                foreach ($boards as $board):
                                ?>
                                <li>
                                    <a href="./board/boardDetail.php?board_id=<?= $board['id_num'] ?>"><?= $board['title'] ?></a>
                                    <span class="date"><?= mb_substr($board['date_posted'], 0 ,10) ?></span>
                                </li>
                                <?php
                                endforeach;
                                ?>
                                <script type="text/javascript" src="./javascript/boardView.js"></script>
                            </ul>
                        </ul>
                        <p class="more">
                            <a href="./board/board.php">
                                <img src="./img/main_bottom_more.png" alt="공지사항 더보기">
                            </a>
                        </p>
                    </div>
                </div>
                <!-- 공지사항 끝 -->


                <!-- 추천도서 시작 -->
                <div id="tabgroup2">


                    <!-- 베스트도서 -->
                    <h2 class="tabtit1">
                        <a href="#">
                            <img src="./img/main_bottom_logo3.png" alt="베스트도서">
                        </a>
                    </h2>

                    <div id="listb01">
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

                        // 만약 대출기록과 기부기록이 모두 없어서 추천도서가 없는 경우, 기본 추천 로직을 적용
                        if (empty($books)) {
                            $stmt = $pdo->prepare("SELECT * FROM books ORDER BY loan_count DESC LIMIT 3");
                            $stmt->execute();
                            $books = $stmt->fetchAll();
                        }

                        $i = 0;
                        foreach ($books as $book):
                            $i++;
                    ?>
                        <div id="recommendBook<?= $i; ?>" class="recommendBook" style="display: block;">
                            <p class="recommend_img">
                                <a href="./bookSearch/detail.php?id=<?= $book['id_num'] ?>">
                                    <img src="./img/<?= $book['image_path'] ?>" alt="베스트도서 1" style="width: 66px; height: 105px; border: 1px solid #DFE0E2; float: left; margin-right: 10px;">
                                </a>
                            </p>
                            <ul>
                                <a href="./bookSearch/detail.php?id=<?= $book['id_num'] ?>">
                                    <li class="title" style="width: 154px;"><?= $book['title'] ?></li>
                                    <li class="writer" style="width: 154px;"><?= $book['author'] ?> </li>

                                    <li class="resume" style="width: 154px"><?= mb_substr($book['description'], 0, 25, "utf-8") ?>...</li>
                                </a>
                            </ul>
                        </div>
                        <?php
                        endforeach;
                        ?>

                        <p class="more">
                            <a href="./bookSearch/bestBook.php">
                                <img src="./img/main_bottom_more.png" alt="베스드도서 더보기">
                            </a>
                        </p>
                    </div>
                    
                    <script src="./javascript/bookRecommend.js"></script>
                </div>
                <!-- 추천도서 끝 -->
                
            </div>
            <!-- main_bottom 끝 ================================================================================================================================ -->

        </div>
        <!-- main 끝 ================================================================================================================================ -->


        <!-- footer 시작 ================================================================================================================================ -->
        <style>
        @media (max-width: 490px) {
                    /* #main_bottom에 대한 기본 스타일 */
                    p {
    
    width: 60%;
    
                }
            }
                </style>
        
        <div id="footer">


            <div id="footer_in">


                <div id="copyright_btn">
                    <ul>
                        <li><a href="./register/register.html">개인정보처리방침</a></li>
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

        <!-- 그래프 라이브러리 -->
        <script src="https://code.highcharts.com/highcharts.js"></script>

    </div>
</body>
</html>