<?php

echo (5 && 7) ? "yes<br>\n" : "no<br>\n";
//yes

$a = 5 || 7;

echo $a ? "$a=true<br>\n" : "$a=false<br>\n";
var_dump($a);
//$a=true
echo "<br>\n";

$b = 5 or 7; // and, or 優先權比 = 還低

echo "\$b=$b<br>\n";
//$b=5

$c = (5 or 7);

echo "\$c=$c<br>\n";
//$c=1