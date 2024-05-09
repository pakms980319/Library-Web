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
<html>
<head>
  <title>도서관 편의시설 - 좌석 예약</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional JavaScript; jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./css/seatstyle.css">
    <link rel="stylesheet" href="./css/style_common.css">
    <link rel="stylesheet" href="./css/style_common_layout.css">
    <link rel="stylesheet" href="./css/style_header.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="../css/style_mobile.css">
</head>
<style>

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        margin: 0;
    }

    h1 {
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    h2 {
        margin-top: 30px;
        margin-bottom: 20px;
        color: #555;
    }

    #room-select {
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 30px;
        border-radius: 5px;
        border: 1px solid #aaa;
    }

    #reservation-buttons {
        margin-top: 30px;
    }

    button {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    #seat-map1,
    #seat-map2,
    #seat-map3 {
        width: 90%;
        overflow-x: auto;
    }

    @media only screen and (max-width: 768px) {
        .container {
            padding: 10px;
        }
        h1, h2 {
            font-size: 24px;
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

  <div id="main_seat">
      <div class="container">
          <h1>도서관 편의시설 - 좌석 예약</h1>

          <label for="room-select">열람실 선택:</label>
          <select id="room-select">
              <option value="room1">열람실 1</option>
              <option value="room2">열람실 2</option>
              <option value="room3">열람실 3</option>
          </select>

          <!-- 선택, 사용중, 사용가능에 대한 색상을 설명 (크기를 조금 줄여서) -->
          <h2>좌석 예약</h2>
            <div id="legend">
                <div class="seat" style="width: 20px; height: 20px; margin: 0;"></div>
                <span>사용가능</span>
                <div class="seat selected" style="width: 20px; height: 20px; margin: 0; background-color: rgb(73, 179, 246);"></div>
                <span>선택</span>
                <div class="seat occupied" style="width: 20px; height: 20px; margin: 0;"></div>
                <span>사용중</span>
            </div>
          <div id="seat-map1">
              <?php
              // seat_reservations 테이블에 만기 시간이 지난 예약 정보 삭제
              $stmt = $pdo->prepare("UPDATE seat_reservations SET reserved = 0, user_id = NULL, time_left = NULL WHERE time_left < NOW()");
              $stmt->execute();

              // seat_reservations 테이블에서 room1에 대한 정보 조회
              $stmt = $pdo->prepare("SELECT * FROM seat_reservations WHERE room = 'room1'");
              $stmt->execute();
              $books = $stmt->fetchAll();

              // books 배열에 있는 데이터 출력 foreach문 사용
              foreach ($books as $book):
                  $reservedClass = $book['reserved'] ? 'occupied' : '';
                  ?>
                  <div class="seat <?= $reservedClass ?>" data-seat-index="<?= $book['seat_index'] ?>" onclick="handleSeatClick('<?= $book['room'] ?>', '<?= $book['seat_index'] ?>', this)">
                      <span><?= $book['seat_index'] ?></span>
                  </div>
              <?php endforeach; ?>
          </div>

          <div id="seat-map2">
              <?php
                // seat_reservations 테이블에서 room2에 대한 정보 조회
                $stmt = $pdo->prepare("SELECT * FROM seat_reservations WHERE room = 'room2'");
                $stmt->execute();
                $books = $stmt->fetchAll();

                // books 배열에 있는 데이터 출력 foreach문 사용
              foreach ($books as $book):
                  $reservedClass = $book['reserved'] ? 'occupied' : '';
                  ?>
                  <div class="seat <?= $reservedClass ?>" data-seat-index="<?= $book['seat_index'] ?>" onclick="handleSeatClick('<?= $book['room'] ?>', '<?= $book['seat_index'] ?>', this)">
                      <span><?= $book['seat_index'] ?></span>
                  </div>
              <?php endforeach; ?>
          </div>

          <div id="seat-map3">
              <?php
              // seat_reservations 테이블에서 room3에 대한 정보 조회
              $stmt = $pdo->prepare("SELECT * FROM seat_reservations WHERE room = 'room3'");
              $stmt->execute();
              $books = $stmt->fetchAll();

              // books 배열에 있는 데이터 출력 foreach문 사용
              foreach ($books as $book):
                  $reservedClass = $book['reserved'] ? 'occupied' : '';
                  ?>
                  <div class="seat <?= $reservedClass ?>" data-seat-index="<?= $book['seat_index'] ?>" onclick="handleSeatClick('<?= $book['room'] ?>', '<?= $book['seat_index'] ?>', this)">
                      <span><?= $book['seat_index'] ?></span>
                  </div>
              <?php endforeach; ?>
          </div>

          <?php
          // seat_reservations 테이블에 현재 본인의 회원 정보의 유무 조회
          $stmt = $pdo->prepare("SELECT * FROM seat_reservations WHERE user_id = ?");
          $stmt->execute([$_SESSION['id_num']]);

            $reservation = $stmt->fetch();
          ?>
          <h2>내 좌석 <?php
                    if ($stmt->rowCount() > 0):
                      echo '- 열람실: ';
                      echo $reservation['room'] == 'room1' ? '1열람실' : ($reservation['room'] == 'room2' ? '2열람실' : '3열람실');
                      echo ', 좌석: '.$reservation['seat_index'].'(남은시간: <span id="remainingTime">계산중...</span>)';
                    else:
                      echo '- 현재 예약중인 좌석이 없습니다.';
                    endif;
                    ?></h2>
          <div id="reservation-buttons">
          <?php
          // 예약정보 있으면 연장버튼이, 없으면 예약신청 버튼이 보이게
            if ($stmt->rowCount() > 0):
          ?>
              <button id="extend-button" onclick="extendReservation(<?= $_SESSION['id_num']; ?>, '<?= $reservation['room']; ?>', <?= $reservation['seat_index']; ?>)">예약 연장</button>
              <button id="cancel-button" onclick="cancelReservation('<?= $reservation['room']; ?>', <?= $reservation['seat_index']; ?>)">예약 취소</button>
            <?php else: ?>
              <button id="reserve-button" onclick="reservation(<?= $_SESSION['id_num']; ?>)">예약 신청</button>
            <?php endif; ?>
          </div>
      </div>
  </div>

  <script>
      var endTime = new Date("<?php echo $reservation['time_left']; ?>").getTime();
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
  <script src="./javascript/seatscrpit.js"></script>



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
                <li><a href="#">개인정보처리방침</a></li>
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


</body>
</html>
