<?php
    include 'config/db.php'; 
?>
<!DOCTYPE html>
<html lang="vi"> 
<head>
    <meta charset="UTF-8">
    <title>Damn Vulnerable Web Application</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/bootstrap.bundle.min.js">

</head>
        
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">DVWA</a>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Damn Vulnerable Web Application</h1>
    <p class="text-center text-muted">Ứng dụng web chứa lỗ hổng bảo mật để kiểm thử</p>

    <div class="list-group mt-4 shadow-sm">
        <a href="login.php" class="list-group-item list-group-item-action">SQL Injection, IDOR</a>
        <a href="xss.php" class="list-group-item list-group-item-action">Stored XSS</a>
        <a href="upload.php" class="list-group-item list-group-item-action">File Upload</a>
        <a href="path_traversal/path.php" class="list-group-item list-group-item-action">Path Traversal</a>
        <a href="XXE.php" class="list-group-item list-group-item-action">XXE Injection</a>
        <a href="command.php" class="list-group-item list-group-item-action">Command Injection</a>
        <a href="rfi.php" class="list-group-item list-group-item-action">Remote File Inclusion</a>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>