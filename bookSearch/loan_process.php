<?php
include '../config.php';

session_start();

$response = array('success' => false, 'message' => '대출 실패');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['id_num'];
    $ISBN = $_POST['isbn'];

    $currentDate = date("Y-m-d");
    $dueDate = date("Y-m-d", strtotime("+7 days"));

    $stmt = $pdo->prepare("INSERT INTO loan_records (user_id, ISBN, loan_date, due_date) VALUES (?, ?, ?, ?)");
    if($stmt->execute([$userId, $ISBN, $currentDate, $dueDate])) {
        $stmt = $pdo->prepare("UPDATE books SET loan_count = loan_count + 1, availability = 0 WHERE ISBN = ?");
        if ($stmt->execute([$ISBN])) {
            $response['success'] = true;
            $response['message'] = "대출이 완료되었습니다.";
        } else {
            $response['message'] = "도서 정보 갱신 중 오류가 발생했습니다.";
        }
    } else {
        $response['message'] = "대출 중 오류가 발생했습니다.";
    }

    echo json_encode($response);
}
?>
