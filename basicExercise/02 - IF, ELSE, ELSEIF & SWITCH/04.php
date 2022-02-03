<?php
$valueOne = 11;
$checkOne = 1;
$checkTwo = 100;

if ($valueOne >= $checkOne && $valueOne <= $checkTwo && $valueOne % 2 == 0) {
    echo "All true";
} else {
    echo "Something is wrong";
}