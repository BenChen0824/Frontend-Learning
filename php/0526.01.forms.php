<?php
$hobbies = [
    '3' => '游泳',
    '5' => '爬山',
    '6' => '健身',
    '9' => '跑步',
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form name='form1' onsubmit="senddata(); return false;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">嗜好1</label>

                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="hobby1">
                            <!-- data-multiple -->
                            <option value='' selected disabled>-- 請選擇 --</option>
                            <!-- 預設第一個是請選擇 若有回傳是空字串 所以讓它改成是disable無法點選 提升用戶體驗 -->
                            <?php foreach ($hobbies as $k => $v) : ?>
                                <option value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <!-- 用於選項較多的時候 -->

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">嗜好 2</label>
                        <?php foreach ($hobbies as $k => $v) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hobby2" id="hobby2-<?= $k ?>" value="<?= $k ?>">
                                <!-- for name id value記得改 -->
                                <!-- value在這邊的意思是當他點選某一選項時 才能抓到對應的key值 -->
                                <!-- form1.hobby2.value 可以來側你選到哪個欄位根所對應的key值 -->
                                <label class="form-check-label" for="hobby2-<?= $k ?>">
                                    <?= $v ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>


                    <!-- 用於選項較少的時候 -->
                    <!-- 多選1 -->


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">嗜好 3</label>
                        <?php foreach ($hobbies as $k => $v) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobby3[]" id="hobby3-<?= $k ?>" value="<?= $k ?>">
                                <label class="form-check-label" for="hobby3-<?= $k ?>">
                                    <?= $v ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <input type="hidden" name="test[]" value="hello">
                    <input type="hidden" name="test[]" value="哈囉">



                    <button type="submit" class="btn btn-primary">Submit</button>















                </form>
            </div>
        </div>








    </div>




    <script>
        async function senddata() {
            const fd = new FormData(document.form1);
            const r = await fetch('0526.02.forms_api.php', {
                method: 'POST',
                body: fd,

            });

            const result = await r.json();

            console.log(result);


        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>




</html>