<?php require __DIR__ . '/parts/connect_db.php';
$pagename = 'ab-add';
$title = '新增通訊錄資料-First_Web';

?>
<?php include __DIR__ . '/parts/html_head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="sendData(); return false" novalidate>
                        <!-- data-novalidate意思是自行定義的 所以這樣不會關閉功能 -->
                        <!-- novalidate用來關閉html5所有功能 -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <!-- required是必填欄位 -->
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <!-- 這邊type也是text -->
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{8}">
                            <!-- pattern是用來限制格式的 -->
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">Email address</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="10"></textarea>
                            <div class="form-text"></div>
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    //email格式
    const email_regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;;
    //mobile格式
    const mobile_regexp = /^09\d{2}-?\d{3}-?\d{3}$/;
    const name_f = document.form1.name
    const email_f = document.form1.email
    const mobile_f = document.form1.mobile



    async function sendData() {

        //前端欄位檢查
        let isPass = true;

        if (name_f.value.length < 2) {
            alert('姓名至少兩個字');
            isPass = false;
        }
        //如果email有值 但格式不對時會警告
        if (email_f.value && !email_regexp.test(email_f.value)) {
            alert('email格式錯誤');
            isPass = false;
        }
        //如果mobile有值 但格式不對時會警告
        if (mobile_f.value && !mobile_regexp.test(mobile_f.value)) {
            alert('手機格式錯誤');
            isPass = false;
        }
        if (!isPass) {
            return
        }



        //除錯trycatch確認欄位都有東西
        const fd = new FormData(document.form1);
        const r = await fetch('./ab_add_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);

    }
</script>


<?php include __DIR__ . '/parts/html_foot.php' ?>