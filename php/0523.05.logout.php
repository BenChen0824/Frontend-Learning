<?php
session_start();

// session_destroy(); 會清除所有的session 不建議使用
unset ($_SESSION['user']);
//刪除user裡的對應的資料

header('Location: 0523.04.login.php');

//HTTP status 302 有找到並轉向
//cookie存在用戶端
//session基於cookie 資料存於server端
//session資料還是走https 加密 http還是有機會密碼外洩
//session的資料安全性相對cookie高很多