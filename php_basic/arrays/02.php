<?php
$numbers = [20, 30, 25, 35, -16, 60, -100];
//todo calculate an average value of the numbers

function calculateAverage(array $numbers) {
    return $result = array_sum($numbers)/count($numbers);
}

echo calculateAverage($numbers);