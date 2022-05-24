<?php

if (!isset($_SESSION)){
    session_start();
}
//判斷session是否有啟動 沒啟動時先開啟



// if (!isset($_SESSION['a'])) {

//     $_SESSION['a'] = 0;
// }
// $_SESSION['a']++;
echo $_SESSION['a'];

//長時間的儲存session
//關機或離開都還能有紀錄
//使用資料庫儲存或是檔案(array)儲存