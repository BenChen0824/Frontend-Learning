<?php
if (!isset($pagename)) {
    $pageName = '';
}
?>

<style>
    .navbar .navbar-nav .nav-link.active {
        background-color: #ccf;
        color: white;
        font-weight: 800;
        border-radius: 5px;
    }
</style>





<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'index' ? 'active' : '' ?>" href="./index_.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?>" href="./ab_list.php">通訊錄選單</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'ab-add' ? 'active' : '' ?>" href="./ab_add.php">新增通訊錄</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</div>