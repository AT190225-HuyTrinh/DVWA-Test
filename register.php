<?php
    include "config/db.php";
    $msg1 = "";
    $msg2 = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $ktra_sql = "SELECT * FROM users WHERE  username = '$username' ";
        $sql_KQ = $conn->query($ktra_sql);
        if($sql_KQ && $sql_KQ->num_rows>0){
            $msg1 = "Tài khoản đã tồn tại!!!";
        }
        else{
            $SQL = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if($conn->query($SQL)){
                $msg2 = "Đăng ký tài khoản thành công!!!";
            }
            else{
                echo "<p style='color:red'>Lỗi: " . $conn->error . "</p>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2> Tạo Tài Khoản </h2>
    <?php 
        if ($msg1) echo "<div class='alert alert-danger'>$msg1</div>"; 
        if ($msg2) echo "<div class='alert alert-success'>$msg2</div>"; 
    ?>
    <form method="POST" class="card p-4 shadow-sm custom-card">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button><br>
    </form>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
