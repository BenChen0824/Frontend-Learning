<?php require __DIR__ . '/parts/connect_db.php';
$pagename = 'ab-list';
$title = '通訊錄-First_Web';

$perpage = 20; //每一頁有幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//intval 轉換成整數
//表單沒有設定方法 就會以get為預設方法來傳出 傳出一個query string

if ($page < 1) {
    //除錯 如果頁碼<1會直接導向回page=1
    header('Location: ?page=1');
    //可以完整路徑或是問號開頭變程式同樣頁面但參數不同而以
    exit;
}

$total_sql = "SELECT COUNT(1) FROM address_book";
//這邊利用sql選出來會是只有一個值
$totalRows = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0];
//這邊是拿到一個statment出來
//利用索引式陣列拿出來 因為總比數會只有一個[0]就是我們需要的

// echo $totalRows;
// exit;
//除錯用 確認是否抓到依樣欄位數

$totalPages = ceil($totalRows / $perpage); //總共有幾頁
// ceil 向上捨入

$rows = [];
//先給預設值 如果下面沒有符合判斷式的話會沒有宣告rows 所以先行宣告


if ($totalRows > 0) {
    if ($page > $totalPages) {
        //頁碼超過總頁數時
        header("Location: ?page=$totalPages");
        //記得要雙引號才能引用變數
        exit;
    }

    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s ", ($page - 1) * $perpage, $perpage);
    // SELECT * FROM address_book LIMIT 0,5
    // 第0筆資料開始 抓5筆

    //MVC
    $rows = $pdo->query($sql)->fetchAll();
    //這邊還是他head前面的位置 所以要把連線先建立在這邊

}





?>
<?php include __DIR__ . '/parts/html_head.php' ?>
<!-- 這邊開始式html -->
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>

                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        //這邊for的設定式讓頁樹號碼展開 page=1 他只會顯示1-6 但如果page是10  他會顯示5-15
                        if ($i >= 1 and $i <= $totalPages) :
                            //要給if判斷不然會<1跟超過最大數
                    ?>

                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <!-- href那編寫入php導向位置 -->
                            <!-- 頁碼部分也要嫌入php帶入 -->
                    <?php endif;
                    endfor; ?>

                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>



    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Birth</th>
                <th scope="col">Address</th>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td>
                        <a href="./ab_update.php?sid=<?= $r['sid'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <td>
                        <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>

                        <?php /*
                        <a href="./ab_delete.php?sid=<?= $r['sid'] ?>" onclick="return comfirm('請問確定要刪除編號<?= $r['sid'] ?>的資料嗎')"><i class="fa-solid fa-trash-can"></i></a>
                        */?>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    function disappear(elem) {
        // const disappearrow = document.querySelectorAll('.rowdisappear');
        // disappearrow[this].style.display = 'none';

        // elem.parentNode.parentNode.style.display = 'none';
        elem.parentNode.parentNode.remove();
    }

    function delete_it(sid) {
        if (confirm(`請問要刪除編號為${sid}的資料嗎?`)) {
            location.href = `ab_delete.php?sid=${sid}`;
        }





    }
</script>
<!-- 這邊是html跟scripts都結束 -->
<?php include __DIR__ . '/parts/html_foot.php' ?>