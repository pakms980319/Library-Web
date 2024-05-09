<?php
include '../config.php';

session_start();

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$publish_year = $_POST['publication_year'];
$genre = $_POST['genre'];
$description = $_POST['description'];

// 파일 업로드 관련 코드
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["cover"]["name"]);
move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);

$stmt = $pdo->prepare("INSERT INTO books (isbn, title, author, publisher, publication_year, genre, description, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$result = $stmt->execute([$isbn, $title, $author, $publisher, $publish_year, $genre, $description, $_FILES["cover"]["name"]]);

if ($result && $stmt->rowCount() > 0) {
    $stmt = $pdo->prepare("INSERT INTO donations (ISBN, title, donor_name) VALUES (?, ?, ?)");
    $result = $stmt->execute([$isbn, $title, $_SESSION['user_name']]);
    ?>
    <script>
        alert("기부가 완료되었습니다.")
        location.replace("./donate.php");
    </script>
    <?php
} else {
    ?>
    <script>
        alert("기부에 실패했습니다.")
        history.back();
    </script>
    <?php
}