<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,

    'code' => 0,
    'error' => '',
];

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;


//後端欄位檢查

if (empty($sid) or empty($_POST['name'])) {
    $output['error'] = "沒有姓名資料";
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'] ?? "";
//$_POST['email']如果是undefined  給他後面的值
$mobile = $_POST['mobile'] ?? "";
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$address = $_POST['address'] ?? "";

//檢查email是否為空值且email格式是否正確
if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = "email狀態錯誤";
    $output['code'] = '405';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
//需要檢查其他欄位的話寫在這裡


$sql = "UPDATE `address_book` 
SET `name`=?, `email`=?, `mobile`=?, `birthday`=?, `address`=? WHERE `sid`=$sid ";


$stmt = $pdo->prepare($sql);
$stmt->execute([
    $name,
    $email,
    $mobile,
    $birthday,
    $address,
]);


if ($stmt->rowCount() == 1) {
    //修改的筆數是否為1 是的話為true
    $output['success'] = true;
    header("Location: ab_list.php");
} else {
    $output['error'] = "資料沒有修改";
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
