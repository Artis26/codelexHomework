<?php

function printArray(array $numbers): string {
    return implode( ", ", $numbers );
}

function printSortedArray(array $numbers): string {
    sort($numbers);
    return implode( ", ", $numbers );
}

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: " . printArray($numbers) . PHP_EOL;

//todo
echo "Sorted numeric array: " . printSortedArray($numbers) . PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: " . printArray($words) . PHP_EOL;

//todo
echo "Sorted string array: " . printSortedArray($words) . PHP_EOL;