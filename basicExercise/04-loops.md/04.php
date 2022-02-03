<?php

$newArr = [10, 19, 21, 34, 44, 9];

foreach ($newArr as $num) {
    if ($num % 3 == 0) {
       echo $num . ' ';
    }
}