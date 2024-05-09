<?php
include '../config.php';

session_start();

$response = array('success' => false, 'message' => '반납 실패');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ISBN = $_POST['isbn'];

    $stmt = $pdo->prepare("UPDATE books SET availability = 1 WHERE ISBN = ?");
    $re = $stmt->execute([$ISBN]);

    if ($re) {
        $stmt = $pdo->prepare("UPDATE loan_records SET returned = 1 WHERE isbn = ? AND user_id = ?");
        $stmt->execute([$ISBN, $_SESSION['id_num']]);
        $response['success'] = true;
        $response['message'] = '반납 성공';
    }

    echo json_encode($response);
}
?>
