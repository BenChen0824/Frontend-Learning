<?php

$db_host = 'localhost'; // 主機名稱
$db_user = 'ben'; // 資料庫連線的用戶
$db_pass = 'ben'; // 連線用戶的密碼
$db_name = 'mfee_26';  // 資料庫名稱
//如果沒寫就是沒指定 可以進的去淡之後容易抱錯
$db_charset = 'utf8';
// $db_collate = 'utf-8_unicode'

$dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
//data sourse name
//直接寫死編碼

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //錯誤模式可以用力外來處理try-catch

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //取出來資料會是關聯式資料
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    //names要加s 直接用utf8寫死 5.x後一定要下 不然會是西歐語系
    //利用mysql mariadb新建立的編碼
];



try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
    //PHP Data Objects
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
