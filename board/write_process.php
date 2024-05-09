<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $password = $_POST['password'];
    $description = $_POST['content'];

    if($password == '0000') {
        $stmt = $pdo->prepare("INSERT INTO board (title, author, description) VALUES (?, ?, ?)");
        $result = $stmt->execute([$title, $author, $description]);

        // 삽입 작업이 성공적으로 이루어졌는지 확인
        if ($result && $stmt->rowCount() > 0) {
            ?>
            <script>
                alert("글이 작성되었습니다.")
                location.replace("./board.php");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("글이 작성에 실패했습니다.")
                history.back();
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("비밀번호가 틀렸습니다.")
            history.back();
        </script>
<?php
    }
}
