<?php
include '../config.php';
session_start();

$response = array('success' => false, 'message' => '로그인 실패', 'name' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND password = ?");
    $stmt->execute([$id, $password]);

    if ($user = $stmt->fetch()) {
        $_SESSION['id_num'] = $user['id_num'];
        $_SESSION['user_id'] = $user['id']; // 세션 변수 설정
        $_SESSION['user_name'] = $user['name'];
        $response['success'] = true;
        $response['name'] = $user['name'];
    } else {
        $response['message'] = '아이디나 비밀번호가 잘못되었습니다.';
    }
}

echo json_encode($response);
