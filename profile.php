<?php

    include "config/db.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
    $id = $_GET['id']; 
    // đây là lỗi idor vì chỉ cần chỉnh sửa id vì dùng method get nên sẽ trả về kqua vậy chỉ cho xem id theo phiên đăng nhập

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    /* $id = $_SESSION['id'];
    loại trừ sqli
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result(); */


    if ($row = $result->fetch_assoc()) {
        echo "<h2>Thông tin tài khoản</h2>";
        echo "ID: " . $row['id'] . "<br>";
        echo "Username: " . $row['username'] . "<br>";
        echo "Password: " . $row['password'] . "<br>"; 
    }
    else{
        echo "<p style='color:red'>Không tồn tại ID: $id</p>";
    }
?>