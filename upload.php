<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>File Upload Demo</title>
</head>
<body>
    <h1>Upload File</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file"><br><br>
        <button type="submit">Upload</button>
    </form>

<?php
    $target_dir = "uploads/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //lỗi là k lọc file nên lọc file
        /*$block_file = ["php", "html", "js"];
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($file_ext, $block_file)) {
            die("Không cho phép tải lên tệp .$file_ext !!!");
        }*/
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "<div class='alert alert-success mt-3'>Đã upload: <a href='$target_file'>$target_file</a></div>";
        } 
        else {
            echo "<div class='alert alert-danger mt-3'>Lỗi upload!</div>";
        }
    }
?>
</body>
</html>
