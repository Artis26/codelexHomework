<?php
$inputOne = 15;
$inputTwo = 45;

if ($inputOne == 15 || $inputTwo == 15) {
    echo "TRUE that one is 15" . PHP_EOL;
} else if ($inputOne + $inputTwo == 15) {
    echo "TRUE that sum is 15" . PHP_EOL;
} else if (abs($inputOne - $inputTwo) == 15) {
    echo "TRUE difference is 15" . PHP_EOL;
} else {
    echo "No match" . PHP_EOL;
}
