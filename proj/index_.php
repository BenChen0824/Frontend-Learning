<?php require __DIR__ . '/parts/connect_db.php';

//MVC
$rows = $pdo->query("SELECT * FROM address_book LIMIT 5") -> fetchAll();






?>
<?php include __DIR__ . '/parts/html_head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Birth</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $a) ?>
            <tr>
                <td></td>
            </tr>
        </tbody>

    </table>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html_foot.php' ?>