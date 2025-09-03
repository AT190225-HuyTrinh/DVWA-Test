<?php
    $output = "";
    if(isset($_POST["domain"])){
        $host = $_POST["domain"];  
        if(!preg_match("/^([a-zA-Z0-9]+\.)+[a-zA-Z]{2,}$/", $host)){
            $output = "Domain không hợp lệ!!!";
        }
        else{
            $output = shell_exec("nslookup " . $host);
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Nslookup</title>
    <style>
        body {
            text-align: center;
            font-family: Consolas, monospace;
            background: #f9f9f9;
            padding: 20px;
        }
        .output {
            margin: 20px auto;
            max-width: 800px;
            text-align: left;
            background: #1e1e1e;
            color: #00ff00;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.3);
            white-space: pre-wrap;
        }
        h2 {
            margin-bottom: 10px;
        }
        h3{
            text-align: left;
        }
        input {
            padding: 6px;
            font-family: inherit;
        }
        button {
            padding: 6px 12px;
            font-family: inherit;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>NSLOOKUP</h2>
    <form method="POST">
        Nhập domain name:
        <input type="text" name="domain" placeholder="google.com">
        <button type="submit">Lookup</button>
    </form>
    <h3>Kết Quả:</h3>
    <div class="output">
        <?php echo htmlspecialchars($output);?>
    </div>
</body>
</html>