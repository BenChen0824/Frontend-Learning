<?php
$hash = '$2y$10$CL.3RQJgAq827QWIRvY9quKbiKTn6NIdAw3ViUNjkY0PmuCcJQBOq';

$password = isset($_GET['p']) ? $_GET['p'] : '';

if (password_verify($password, $hash)) {
    echo '正確';
} else {
    echo '錯誤的密碼';
}

// 網址後面加?p=123456 來測試