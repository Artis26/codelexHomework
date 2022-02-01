<?php
// x(t) = 0.5 * at2 + vit + xi
// a => accelelration(m/s2) = -9.81
// t => time(s) = -10
// vi => initial velocity (m/s) = 0
// xi => initial position = 0

$acceleration = -9.81;
$time = -10;
$initialVelocity = 0;
$initialPosition = 0;

$result = 0.5 * $acceleration*$time**2 + $initialVelocity * $time + $initialPosition;
echo $result . 'm' . PHP_EOL;
