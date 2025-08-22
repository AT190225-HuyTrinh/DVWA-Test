<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileUpload"])){
       $fileType = strtolower(pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION));
       if($fileType != "xml"){
            die("Chỉ chấp nhận file xml!!!");
       }
       //libxml_disable_entity_loader(true);
       //chặn k cho tải entity 
       $xml = file_get_contents($_FILES["fileUpload"]["tmp_name"]);
       $data = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOENT | LIBXML_DTDLOAD);
       /* đoạn code dòng 10 gây lỗi xml external entity vì có dùng 2 cờ gây lỗi là
        LIBXML_NOENT(substitute entity) thay thế tất cả entity trong xml
        VD <!ENTITY test SYSTEM "file://http://localhost/DVWA/public_secret/secret.txt"
        <>&test;<>
        LIBXML_DTDLOAD(DTD: document type definition) là cờ cho phép tải, định nghĩa 1 document
        do đó 2 cờ này cho phép có thể định nghĩa document tạo thực thể ngoài */
       
       if($data == false){
            die("Không đọc được file => Vui lòng ktra cấu trúc file!");
       }
       $kq = [];
       foreach($data->sinhvien as $sv){
            $kq[] = [
                "MSV" => (string)$sv->MSV,
                "name" => (string)$sv->name,
                "email" => (string)$sv->email,
                "que" => (string)$sv->que
            ];
       }
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($kq, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;       
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XXE</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #333;
            font-family: "Press Start 2P", sans-serif;
            padding: 20px;
            color: #fff;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            font-size: 32px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 8px #ccc;
            margin-bottom: 20px;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ffa500;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <h1> Upload file</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="fileUpload" id="fileUpload" accept=".xml" required>
        <input type="submit" value="Tải file XML lên" name="submit">

    </form>
    <a href="SinhVien.xml" download style="color: #0000FF"> Tải file SinhVien.xml về</a>
</body>
</html>