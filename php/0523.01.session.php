<?php

session_start();
//一定要放在html之前
//為了設定cookie
//如果沒有呼叫這個函式 $_SESSION無法使用


if (!isset($_SESSION['a'])) {
    //當沒有設置session時 將其設定為0
    $_SESSION['a'] = 0;
}
$_SESSION['a']++;
echo $_SESSION['a'];
