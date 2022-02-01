<?php

require_once ('ZCarSimulator/FuelGauge.php');
require_once ('ZCarSimulator/Odometer.php');
require_once ('ZCarSimulator/Tyres.php');
require_once ('ZCarSimulator/Beams.php');
require_once ('ZCarSimulator/Car.php');
require_once ('ZCarSimulator/Accumulator.php');

$car = new Car('AUDI', 10, 'day');
echo $car->setCarActive();
echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->getFuel() > 0 && $car->isActive == true) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
    $car->drive();//$driveDistance
    echo $car->getTyreReview();
    echo $car->checkCondition();
    if ($car->dayTime == 'day') {
        echo $car->getLowBeamReview();
    } else {
        echo $car->getHighBeamReview();
    }

    sleep(1);
}
