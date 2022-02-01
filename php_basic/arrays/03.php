<?php
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];


$valueToSearchFor = readline("Enter the value to search for: ");

if (in_array($valueToSearchFor, $numbers)) {
    echo "We got a match! - $valueToSearchFor" . PHP_EOL;
} else {
    echo "No match!" . PHP_EOL;
}

//todo check if an array contains a value user entered