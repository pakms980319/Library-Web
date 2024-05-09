<?php
include '../config.php';

$email = $_GET['email'];
$id = $_GET['id'];

$query = $pdo->prepare("SELECT password FROM users WHERE email = ? AND id = ?");
$query->execute([$email, $id]);
$user = $query->fetch();

$response = [];

if ($user) {
    $response["success"] = true;
    $response["data"] = ["password" => $user["password"]];
} else {
    $response["success"] = false;
    $response["message"] = "해당 이메일로 등록된 아이디가 없습니다.";
}

echo json_encode($response);
?>