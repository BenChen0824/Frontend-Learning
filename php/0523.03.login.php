<?php
//建議<?php前面不要有任何的空白行
session_start();

$user = [
    //帳號當成key值
    //value放在內層
    'bear' => [
        'password' => '123123',
        'username' => '大雄'
    ],
    'doraemon' => [
        'password' => '456456',
        'username' => '多拉a夢'
    ],
];

$output = [
    //除錯用
    'postdata' => $_POST,
];

if (isset($_POST['account'])) {
    // echo json_encode($_POST);
    // exit; //停止php運行
    // die();

    // 如果帳號不為空值且密碼不為空值
    if (!empty($_POST['account']) and !empty($_POST['password'])) {
        if (!empty($user[$_POST['account']])) {
            if ($_POST['password'] === $user[$_POST['account']]['password']) {
                //登入成功
                $output['msg'] = '登入成功';
                echo json_encode($output);
                exit;
            } else {
                $output['msg'] = '帳號正確 密碼錯誤';
                echo json_encode($output);
                exit;
            }
        } else {
            // 帳號錯誤
            $output['msg'] = '帳號錯誤';
            echo json_encode($output);
            exit;
        }
    } else {
        //其中一欄沒有填值
        $output['msg'] = '帳號密碼都需要完整輸入';
        echo json_encode($output);
        exit;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="account" id="account" placeholder="帳號">
        <br>
        <input type="password" name="password" id="password" placeholder="密碼">
        <br>
        <input type="submit" value="登入">

    </form>
    <!-- 練習:如果有一欄沒填寫表單不要送出 -->




</body>

</html>