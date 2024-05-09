<?php
include '../config.php';

$email = $_GET['email'];

$query = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$query->execute([$email]);
$user = $query->fetch();

$response = [];

if ($user) {
    $response["success"] = true;
    $response["data"] = ["id" => $user["id"]];
} else {
    $response["success"] = false;
    $response["message"] = "해당 이메일로 등록된 아이디가 없습니다.";
}

echo json_encode($response);
?>