<?php
//把後面的資料copy到__dir__
require __DIR__ . './connect_db.php';

//透過PDO這個連線來執行QUERY這個語法取得statement的物件
$stmt = $pdo->query("SELECT * FROM address_book LIMIT  5");
//取前面最多五筆

// 利用fetch一筆一筆拿出來
$row = $stmt->fetch();

echo json_encode($row);
