<?php
$startValue = 1;
$endValue = 100;
$allNumbers = range($startValue, $endValue);
$sumOfNumbers = array_sum($allNumbers);
$avgOfNumbers = $sumOfNumbers / count($allNumbers);

echo "Sum of $startValue to $endValue is $sumOfNumbers!" . PHP_EOL;
echo "The average is $avgOfNumbers!" . PHP_EOL;


