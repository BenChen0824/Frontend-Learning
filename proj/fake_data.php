<?php require __DIR__ . '/parts/connect_db.php';


/*
資料寫死
//避免SQL Injection(SQL隱碼攻擊)
$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        '李小明','abds@123.com','0912345678','1990-08-08','台北市', NOW())";
        
$stmt = $pdo->query($sql);


*/

//新增外來資料時 一慮使用prepare-execute
$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        ?,?,?,?,?, NOW())";
//根據多少資料填多少問號
//問號不用單雙引號!


$stmt = $pdo->prepare($sql);
$stmt->execute([
    //下面雙引號execute會自動幫你跳脫
    "熊大's pen", 'fkold@123.com', '0916842571', '1990-01-02', '新竹市',
    //幾個問號填幾個資料
]);

echo $stmt->rowCount();
//返回所執行的行數
//這邊的話式返回新增的行數