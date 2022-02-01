<?php
$startValue = 1;
$endValue = 10;
$allNumbers = range($startValue, $endValue);
$mltOfNumbers = array_product($allNumbers);

echo "Multiplication from $startValue to $endValue is $mltOfNumbers!" . PHP_EOL;