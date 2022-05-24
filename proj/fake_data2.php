<div>
    <?php require __DIR__ . '/parts/connect_db.php';
    exit; // 關閉功能避免誤觸


    echo microtime(true) . "<br>";
    //用以確認整個資料的時間 前後加一個

    $lname = ['陳', '王', '林', '周', '沈'];
    $fname = ['小華', '小明', '小鐘', '大頭', '大明'];



    $sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        ?,?,?,?,?, NOW())";


    $stmt = $pdo->prepare($sql);

    for ($i = 0; $i < 100; $i++) {
        shuffle($lname);
        shuffle($fname);
        $ts = rand(strtotime('1980-01-05'), strtotime('1999-12-31'));
        $stmt->execute([
            $lname[0] . $fname[0], "abc$i@123.com", '0910' . rand(100000, 999999), date('Y-m-d', $ts), '新竹市',

        ]);
    }






    echo microtime(true) . "<br>";
    //用以確認整個資料的時間 前後加一個
    ?>
</div>