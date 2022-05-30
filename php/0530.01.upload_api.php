<?php

header('Content-Type: application/json');

$folder = __DIR__ . '/upload/';
move_uploaded_file($_FILES['myfile']['tmp_name'], $folder . $_FILES["myfile"]['name']);

echo json_encode($_FILES);


/*
{
    "myfile": {
        "name": "v_147904924_m_601_220_124.jpg",
        "type": "image/jpeg",
        "tmp_name": "C:\\xampp\\tmp\\phpD0FA.tmp",
        "error": 0,
        "size": 5815
    }
}

*/

/*
myfile[]


{
    "myfile": {
        "name": [
            "v_149089244_m_601_220_124.jpg",
            "v_149096095_m_601_220_124.jpg",
            "v_149255855_m_601_m1_220_124.jpg"
        ],
        "type": [
            "image/jpeg",
            "image/jpeg",
            "image/jpeg"
        ],
        "tmp_name": [
            "C:\\xampp\\tmp\\php7903.tmp",
            "C:\\xampp\\tmp\\php7904.tmp",
            "C:\\xampp\\tmp\\php7905.tmp"
        ],
        "error": [
            0,
            0,
            0
        ],
        "size": [
            5941,
            9329,
            5576
        ]
    }
}


*/