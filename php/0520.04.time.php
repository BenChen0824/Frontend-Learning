<?php
header('Content-Type: text/plain');

date_default_timezone_set('Asia/Taipei');
//原本在php內設定檔事berlin 所以時間是那邊為主
//這邊重新設定時間位置
// 如果要改得話可以去開php.ini 裡面的timezone去改
echo date("Y-m-d H:i:s") . "\n";
//2022-05-20 12:03:48
echo time() . "\n";
//1653019428

echo date("Y-m-d H:i:s", time() + 30 * 24 * 60 * 60) . "\n";
//2022-06-19 12:03:48
$t = strtotime('2022-05-20');
echo strtotime('2022-05-20') . "\n";
//1652976000
echo date("Y-m-d H:i:s", $t) . "\n";
//2022-05-20 00:00:00

