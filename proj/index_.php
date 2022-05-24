<?php require __DIR__ . '/parts/connect_db.php';
$pagename = 'index';
$title = '首頁-First_Web';

?>
<?php include __DIR__ . '/parts/html_head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <h2>Home</h2>
    <!-- $pdo->quote() 用來跳脫 SQL 裡值的單引號, 避免 SQL injection  -->
    <p><?= $pdo->quote("Alice's cats") ?></p>

</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html_foot.php' ?>