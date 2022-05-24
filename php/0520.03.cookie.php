<?php

setcookie('myCookie', 'aabbccdd', time() + 20);

echo $_COOKIE['myCookie'];
