<?php
include '../config.php';

session_start();

$response = array('success' => false, 'data' => array());

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT name, id, phone, email FROM users WHERE id = ?");
    $stmt->execute([$user_id]);

    if ($user = $stmt->fetch()) {
        $response['success'] = true;
        $response['data'] = $user;
    } else {
        $response['message'] = "사용자 정보를 찾을 수 없습니다.";
    }
} else {
    $response['message'] = "로그인 후 조회가능합니다.";
}

echo json_encode($response);
?>
