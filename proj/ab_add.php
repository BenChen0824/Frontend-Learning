<?php require __DIR__ . '/parts/connect_db.php';
$pagename = 'ab-add';
$title = '新增通訊錄資料-First_Web';

?>
<?php include __DIR__ . '/parts/html_head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }
</style>

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
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <!-- 這邊type也是text -->
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{8}">
                            <!-- pattern是用來限制格式的 -->
                            <div class="form-text red"></div>
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
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        資料新增成功
                    </div>
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
    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;

    const info_bar = document.querySelector('#info-bar');

    const fields = [name_f, email_f, mobile_f];
    const fieldTexts = [];
    for (let i of fields) {
        fieldTexts.push(i.nextElementSibling);
        //將要放提示文字的部分放到陣列中
    }


    async function sendData() {

        //一開始先讓欄位外觀回復原狀
        for (let i in fields) {
            //for in 拿到的是index值
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }

        info_bar.style.display = 'none'; // 隱藏訊息列,如果沒有跳轉頁面要讓她回復到不存在 後面成功在顯示出來


        //前端欄位檢查
        let isPass = true;

        if (name_f.value.length < 2) {
            // alert('姓名至少兩個字');
            /*
            // element.classList (add,remove cotains)
            name_f.classList.add('red');
            //表格變紅

            // name_f.nextElementSibling.classList.add('red');
            //字體變紅

            // name_f.closest('.mb-3').querySelector('.form-text').classList.add('red');
            // .closest 可以往上一直找直到找到指定的MB-3 不限一層
             //字體變紅

            name_f.parentNode.querySelector('.form-text').classList.add('red');
            //.parentNode只會往上找一層
             //字體變紅
            */

            //將資料直接放在陣列裡面 利用陣列裡面資料直接改變比較快
            fields[0].classList.add('red');
            fieldTexts[0].innerText = '姓名至少兩個字';
            isPass = false;
        }
        //如果email有值 但格式不對時會警告
        if (email_f.value && !email_regexp.test(email_f.value)) {
            // alert('email格式錯誤');
            fields[1].classList.add('red');
            fieldTexts[1].innerText = 'email 格式錯誤';
            isPass = false;
        }
        //如果mobile有值 但格式不對時會警告
        if (mobile_f.value && !mobile_regexp.test(mobile_f.value)) {
            // alert('手機格式錯誤');
            fields[2].classList.add('red');
            fieldTexts[2].innerText = '手機號碼格式錯誤';
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

        info_bar.style.display = "block";
        if (result.success) {
            //result.success 去查看add_api裡最下面 成功的話會是true
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '新增成功';

            setTimeout(() => {
                location.href = 'ab_list.php'; // 跳轉到列表頁
            }, 4000);//延遲4秒
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料無法新增';
        }
    }
</script>


<?php include __DIR__ . '/parts/html_foot.php' ?>