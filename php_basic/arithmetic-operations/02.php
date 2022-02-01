<?php
function CheckOddEven($n) {
    if ($n % 2 == 0) {
        echo "EVEN";
    } else {
        echo "ODD";
    }
};
echo CheckOddEven(19) . PHP_EOL;
echo CheckOddEven(20) . PHP_EOL;