<?php

function printArray(array $numbers): string {
    return implode( ", ", $numbers );
}

$arrayOfNumbers = [];
for ($i = 1; $i < 10; $i++) {
    $newNum = rand(1, 100);
    $arrayOfNumbers[] = $newNum;
}

$copyOfArr = $arrayOfNumbers;
array_pop($arrayOfNumbers);
$arrayOfNumbers[] = -7;

echo 'Array 1: ' . printArray($arrayOfNumbers) . PHP_EOL;
    echo "-------|" . PHP_EOL;
echo 'Array 2: ' . printArray($copyOfArr) . PHP_EOL;

