<?php
require __DIR__ . '/parts/connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,

    'code' => 0,
    //除錯用

    'error' => '',
];

//後端欄位檢查

if (empty($_POST['name'])) {
    $output['error'] = "沒有姓名資料";
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
    ?,?,?,?,?,NOW())";


$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'],
]);

// $output['success'] = $stmt->rowCount()==1;
// $output['success'] = $stmt->!!rowCount();

if ($stmt->rowCount() == 1) {
    //新增的筆數是否為1 是的話為true
    $output['success'] = true;

    // 最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = "資料無法新增";
}


//isset vs empty 
//isset就算設定為undefined或是NULL都會算是有設定過
//empty則是沒設定或是為空值都匯回傳true


echo json_encode($output, JSON_UNESCAPED_UNICODE);
