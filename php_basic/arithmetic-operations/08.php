<?php

function WageCalculator($name, $paidInHour, $hoursWorked): string
{
    $paidForOvertime = 1.5;
    $baseHours = 40;
    $overTime = $hoursWorked - $baseHours;
    $totalWithOvertime = ($baseHours * $paidInHour) + $overTime * ($paidInHour * $paidForOvertime);
    $totalWithoutOvertime = $hoursWorked * $paidInHour;

    if ($paidInHour <= 8.00) {
        return $name . ' ' . 'Need to get payed MORE!!!' . PHP_EOL;
    } else if ($hoursWorked > 60) {
        return $name . ' ' . 'worked too much!!!' . PHP_EOL;
    } else if ($overTime > 0) {
        return "$name earned: $totalWithOvertime !" . PHP_EOL;
    } else {
        return "$name earned: $totalWithoutOvertime !" . PHP_EOL;
    }
}

echo WageCalculator('Employee 1', 7.50, 35);
echo WageCalculator('Employee 2', 8.20, 47);
echo WageCalculator('Employee 3', 10.00, 73);