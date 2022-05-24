<?php

$ar = [
    'name' => '小陳',
    //關聯式陣列類似object的用法 但給定值只能用胖箭頭=>來賦予值
    'age' => '25',
    'data' => [1,3,5,7,9]
];

echo json_encode($ar,JSON_UNESCAPED_UNICODE);
//這邊是因為JSON會把中文改成UNICODE編碼 所以如果沒跳脫會以編碼方式呈現