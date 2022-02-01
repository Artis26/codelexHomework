<?php
// BMI = weight x 703 / height ^ 2
$hightInCentimeters = readline("Enter Your hight in centimeters: ");
$weightInKilos = readline("Enter Your weight in kilos: ");

$hightToInches = $hightInCentimeters / 2.54;
$weightToPounds = $weightInKilos * 2.20462262;

$bmiCalculator = $weightToPounds * 703 / $hightToInches ** 2;

if ($bmiCalculator < 18.5) {
    echo round($bmiCalculator, 1) . " - Underweight. You should eat more!!!" .PHP_EOL;
} else if ($bmiCalculator >= 18.5 && $bmiCalculator <= 25.00) {
    echo round($bmiCalculator, 1) . " - Optimal weight. That`s cool!" . PHP_EOL;
} else if ($bmiCalculator > 25.00) {
    echo round($bmiCalculator, 1) . " - Overweight. Slow down with sweets champ!!!" . PHP_EOL;
}


