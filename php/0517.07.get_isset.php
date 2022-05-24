<?php

$a = isset ($_GET['a']) ? $_GET['a'] : '沒這個東西' ;
//isset是為了確認a是否已經被賦予值 如果賦予回傳值，沒有則回覆0
echo $a.'<br>';

var_dump($a);