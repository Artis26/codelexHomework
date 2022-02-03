<?php
$arrayWithNums = [3, 5, 7, 2.10, '1'];

for ($i = 0; $i < count($arrayWithNums); $i++) {
    $newArr = array_map('doubleValues', $arrayWithNums);
}

function doubleValues($num) {
    return $num * 2;
}

foreach ($newArr as $num) {
    echo "$num ";
}