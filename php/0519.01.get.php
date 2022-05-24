<?php


$a = isset($_GET['a']) ? $_GET['a'] : '';
$b = isset($_GET['b']) ? $_GET['b'] : '';
sleep(5); //睡五秒
echo $a + $b;