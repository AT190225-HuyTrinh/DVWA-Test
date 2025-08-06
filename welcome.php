<?php
session_start();
if (!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Đăng Nhập Thành Công!!!</h1>
    <h2>Chào mừng, <?php echo $_SESSION["username"]; ?>!</h2>
     <form action="profile.php" method="get">
        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
        <button type="submit">Xem hồ sơ</button>
    </form>

</body>
</html>