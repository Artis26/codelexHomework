<?php
function calculate(int $a, int $b): int {
    return $a * $b;
}
$a = readline("Enter value a: ");
$b = readline("Enter value b: ");

echo calculate($a, $b) . PHP_EOL;