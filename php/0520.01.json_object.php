<?php
header('Content-Type: text/plain');

$ar = '{
    "name" : "小陳",
    
    "age" : "25",
    "data" : [1, 3, 5, 7, 9]
}';


$a = json_decode($ar, true);
//當第二個參數為true時回傳array,否則為obj
$b = json_decode($ar);

var_dump($a);
var_dump($b);
echo $b->name;