<?php
    include "config/db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //do k lọc dữ liệu input cho nên học chèn đc đoạn payload độc vào 
    $comment = $_POST["comment"];
    //$comment = htmlspecialchars($_POST["comment"], ENT_QUOTES);
    //ta chuyển đôi hết dấu đặc biệt thành dạng ký tự html đặc biệt để đoạn payload hiển thị text thay vì thực thi đoạn payload đó
    $conn->query("INSERT INTO comments (comment) VALUES ('$comment')");
    }
    $hienThi = $conn->query("SELECT * FROM comments ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Stored XSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Stored XSS</h2>
    <form method="POST" class="card p-4 shadow-sm custom-card mb-4">
        <div class="mb-3">
            <label>Comment</label>
            <input type="text" name="comment" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
    </form>
    <?php while($row = $hienThi->fetch_assoc()): ?>
        <div class="alert alert-secondary"><?= $row['comment'] ?></div>
    <?php endwhile; ?>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>