<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include($page);
} else {
    echo "Cung cấp đường dẫn trang web!";
}
?>
