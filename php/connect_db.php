<?php

$db_host = 'localhost'; // 主機名稱
$db_user = 'chen'; // 資料庫連線的用戶
$db_pass = 'fuck721523'; // 連線用戶的密碼
$db_name = 'mfee26';  // 資料庫名稱
//如果沒寫就是沒指定 可以進的去淡之後容易抱錯
$db_charset = 'utf8';
// $db_collate = 'utf-8_unicode'

$dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
//data sourse name
//直接寫死編碼

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];



try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    //PHP Data Objects
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
