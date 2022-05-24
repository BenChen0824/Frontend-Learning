<?php

header('Content-Type: text/plain');
//可開啟關閉看html差異

echo htmlentities('>"<') . "\n";
