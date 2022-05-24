<?php
require __DIR__ . './connect_db.php';


$stmt = $pdo->query("SELECT * FROM address_book LIMIT  5");

while ($r = $stmt->fetch()) {
    // 這裡的r會去取fetch到的資料 會是陣列 所以轉換成boolean會是true,while會執行
    //如果沒讀到資料就會是false停止while迴圈
    echo "{$r['name']}<br>";
    //只輸出array裡name的值
}
