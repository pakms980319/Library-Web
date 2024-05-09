<?php
include '../config.php';

session_start();

$isbn = $_POST['isbn'];

$stmt = $pdo->prepare("DELETE FROM donations WHERE isbn = ?");
$result = $stmt->execute([$isbn]);
// 삽입 작업이 성공적으로 이루어졌는지 확인
if ($result && $stmt->rowCount() > 0) {
    $stmt2 = $pdo->prepare("DELETE FROM books WHERE isbn = ?");
    $stmt2->execute([$isbn]);

    echo json_encode(['success' => true, 'msg' => '기부가 취소되었습니다.']);
} else {
    echo json_encode(['success' => false, 'msg' => '기부 취소에 실패했습니다.']);
}