<?php

$output = [
    'postData' => $_POST,
];

$json = json_encode($output, JSON_UNESCAPED_UNICODE);
file_put_contents('./0526.02.forms_api.json', $json);  // JSON 字串存成檔案


echo $json;
