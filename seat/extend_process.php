<?php

include '../config.php';

$response = [
    'success' => false,
    'message' => '연장에 실패했습니다.'
];

if (isset($_POST['room'], $_POST['seatIndex'], $_POST['user_id'])) {
    $room = $_POST['room'];
    $seatIndex = $_POST['seatIndex'];
    $user_id = $_POST['user_id'];

    // 데이터베이스에 정보 저장
    $stmt = $pdo->prepare("UPDATE seat_reservations 
SET reserved = 1, time_left = NOW() + INTERVAL 1 HOUR, user_id = ? 
WHERE room = ? AND seat_index = ?");
    $result = $stmt->execute([$user_id, $room, $seatIndex]);

    // 2. SQL 에러 메시지 확인
    if (!$result) {
        $errorInfo = $stmt->errorInfo();
        $response['message'] = $errorInfo[2];  // PDO에서 반환된 에러 메시지
    } else {
        $response['success'] = true;
        $response['message'] = '예약 연장에 성공했습니다.';
    }
}

echo json_encode($response);
?>
