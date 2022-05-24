<?php
//把後面url的資料copy到__dir__
require __DIR__ . './connect_db.php';
//兩者功能依樣 但require用語較強烈 沒有就停止 資料庫大多用require
// require_once 只要包含一次 也就是後面載有呼喚require_once後面的就會被忽略
// include_once
// include __DIR__ . './connect_db.php';


//透過PDO這個連線來執行QUERY這個語法取得statement的物件
$stmt = $pdo->query("SELECT * FROM address_book LIMIT  5");
//取前面最多五筆

// 利用fetch一筆一筆拿出來
// $row = $stmt->fetch();
// 會把所有包含索引值跟value值都拿出來


// $row = $stmt->fetch(PDO::FETCH_NUM);
// 以索引式陣列的格式取出資料
// 只會拿value值

$rows = $stmt->fetchAll();
// 將所有recordset資料取出

// echo json_encode($row);
echo json_encode($rows);
// 記得加s

//JSON_UNESCAPED_UNICODE 跳脫用