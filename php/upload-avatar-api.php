<?php
header('Content-Type: application/json');

$folder = __DIR__ . '/upload/';

// 用來篩選檔案, 用來決定副檔名
$extMap = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$output = [
    'success' => false,
    'filename' => '',
    'error' => '',
];

if (empty($_FILES['avatar'])) {
    $output['error'] = '沒有上傳檔案';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


//將[$_FILES['avatar']['type']]作為搜尋extmap的參數 如果沒資料會回傳undefine 那就會是empty並執行錯誤
if (empty($extMap[$_FILES['avatar']['type']])) {
    $output['error'] = '檔案類型錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
//如果正確的話 將附檔名加給$ext
$ext = $extMap[$_FILES['avatar']['type']]; // 副檔名
//設定隨機檔名 最後面要加上附檔名
$filename = md5($_FILES['avatar']['name'] . rand()) . $ext;
$output['filename'] = $filename;

// 把上傳的檔案搬移到指定的位置
if (move_uploaded_file($_FILES['avatar']['tmp_name'], $folder . $filename)) {
    $output['success'] = true;
} else {
    $output['error'] = '無法搬動檔案';
}

echo json_encode($output);
