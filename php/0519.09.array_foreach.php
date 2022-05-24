<?php

$ar=[];
for ($i=0;$i<10;$i++){
    $ar[] = rand(1,99);
    //[]的用跟array.push依樣
}

foreach($ar as $v){
    echo $v.'<br>';
}