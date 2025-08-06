<?php
    include "config/db.php";
    $msg = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        //câu lệnh này gây lỗi sqli vì khi ng dùng nhập input thì nó sẽ đc truyền thẳng vào query SELECT * FROM users WHERE username = 'OR 1=1-- ' AND password = '1243'
        //do vậy nên cho 2 tham số trên trở về thành 1 chuỗi ký tự k cho truy vấn sql cho dù nhập "'OR 1=1--'" vì là chuỗi k phải câu lệnh logic nên chặn đc
        $result = $conn->query($sql);
        //Bước 1: Tạo truy vấn rỗng chưa chèn dữ liệu input vào
        //$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        //Bước 2: cho 2 tham số trên về string vì là chuỗi nên nó chỉ coi là dữ liệu k phải câu truy vẫn logic
        //$stmt->bind_param("ss", '$username', '$password');
        //$stmt->execute();
        //$result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $row['username'];
            $_SESSION["id"] = $row['id'];

            header("Location: welcome.php");
            exit();
        }
        else{
            $msg = "Sai tài khoản hoặc mật khẩu!!!!";
        }


    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2> Đăng Nhập </h2>
    <?php 
        if ($msg) echo "<div class='alert alert-danger'>$msg</div>"; 
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
        <button type="submit" class="btn btn-primary">Đăng nhập</button><br>
        <button type="button" onclick="window.location.href='register.php' ">Tạo tài khoản</button>
    </form>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
