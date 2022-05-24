<?php require __DIR__ . '/parts/connect_db.php';

$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        '李小明','abds@123.com','0912345678','1990-08-08','台北市', NOW())";

$stmt = $pdo->query($sql);

echo $stmt->rowCount();
//返回所執行的行數
//這邊的話式返回新增的行數