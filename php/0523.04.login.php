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


if (isset($_POST['account'])) {


    // 如果帳號不為空值且密碼不為空值
    if (!empty($_POST['account']) and !empty($_POST['password'])) {
        if (!empty($user[$_POST['account']])) {
            if ($_POST['password'] === $user[$_POST['account']]['password']) {
                //登入成功
                $_SESSION['user'] = [
                    //登入成功時將資料寫進session
                    'account' => $_POST['account'],
                    'username' => $user[$_POST['account']]['username'],

                ];
            }
        }
    }
    if (!isset($_SESSION['user'])) {
        $error_msg = 'Error Login';
        //只要有任何設定帳號問題都會跳ErrorLogin
        //不管事少填帳密 或是錯誤
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
    <?php if (isset($_SESSION['user'])) : ?>
        <h2><?= $_SESSION['user']['username'] ?> 您好</h2>
        <span><a href="./0523.05.logout.php">登出</a></span>
        <!-- 如果成功設定session 也就是登入成功時 -->
    <?php else : ?>
        <?php if (isset($error_msg)) : ?>
            <!-- 如果有設定$error_msg 沒登入成功 -->
            <div style="color:red"><?= $error_msg ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="text" name="account" id="account" placeholder="帳號" value="<?= isset($_POST['account']) ? htmlentities($_POST['account']) : ''  ?>">
            <!-- htmlentities是防止帳號裡面有雙引號或是大小於之類的字元用於html的跳脫 -->
            <br>
            <input type="password" name="password" id="password" placeholder="密碼">
            <br>
            <input type="submit" value="登入">
        </form>
    <?php endif; ?>





</body>

</html>