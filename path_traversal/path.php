<?php
    if(isset($_GET['file'])){
        //lỗi traversal là ở 2 dòng lệnh 4 và 5 khi lấy file từ người dùng nhập vào mà k ktra hay lọc nên ng dùng có thể chèn payload vào
        $file = $_GET['file'];
        $path = __DIR__ . '/' . $file;

        if (file_exists($path) && is_file($path)) {
            echo "<pre>" . file_get_contents($path) . "</pre>";
        } else {
            echo "Không tìm thấy file!!!";
        }
    }
    //lọc path sẽ chặn path chứa ../, ....//, encode
    /*if(isset($_GET['file'])){
        $file = $_GET['file'];
        $path = __DIR__ . '/' . $file;
        $loc1 = "../";
        $ktra1 = strpos($path, $loc1);
        //string position tìm loc trong path
        if($ktra1 === false){
            if (file_exists($path) && is_file($path)) {
            echo "<pre>" . file_get_contents($path) . "</pre>";
            } 
            else {
            echo "Không tìm thấy file!!!";
            }
        }
        else{
            echo "<p style='color:red'> Phát hiện tấn công traversal!!! </p>";
            exit();
        }
    }*/
    else{
        header("Location: path.php?file=");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <script>
        function HienThi(){
            alert("Hãy tìm file robots.txt để dò tìm flag.txt");
        }
    </script>
</head>

<body onload = "HienThi()">        
</body>

</html>