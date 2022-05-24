<?php

$ar = [
    'name' => 'chen',
    //關聯式陣列類似object的用法 但給定值只能用胖箭頭=>來賦予值
    'age' => '25',
    'data' => [1,3,5,7,9]
];

foreach ($ar as $k => $v) {
    //這邊如果只給定一個變數值的話只會抓value 用法類似於enumerate
    if (is_array($v)) $v = implode('~',$v);
    //判定value值是否為陣列 式的畫利用implode將他join成一個字串
    echo "$k : $v <br>";
}
