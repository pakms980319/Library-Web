<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $stmt = $pdo->prepare("INSERT INTO users (name, id, password, phone, email) VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([$name, $id, $password, $phone, $email]);

    // 삽입 작업이 성공적으로 이루어졌는지 확인
    if ($result && $stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Insertion failed']);
    }
}
