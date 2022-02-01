<?php
$startValue = 1;
$endValue = 110;

while($startValue < $endValue) {
    for ($i = 1; $i <= 11; $i++) {
        if ($startValue % 21 == 0) {
            echo "CozaWoza" . " ";
            $startValue++;
        } else if ($startValue % 15 == 0) {
            echo "CozaLoza" . " ";
            $startValue++;
        } else if ($startValue % 3 == 0) {
            echo "Coza" . " ";
            $startValue++;
        } else if ($startValue % 5 == 0) {
            echo "Loza" . " ";
            $startValue++;
        } else if ($startValue % 7 == 0) {
            echo "Woza" . " ";
            $startValue++;
        } else {
            echo "" . $startValue . " ";
            $startValue++;
        }
    }
    echo " " . PHP_EOL;
}
