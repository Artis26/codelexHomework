<?php
class Car
{
    public bool $isActive = false;
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private array $allTyres;
    private array $lowLights;
    private array $highLights;
    private Accumulator $accumulator;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km

    public function __construct(string $name, int $fuelGaugeAmount, string $dayTime = 'day') {
        $this->name = $name;
        $this->dayTime = $dayTime;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->allTyres = [new Tyre('FrontLeft'), new Tyre('BackLeft'),
            new Tyre('FrontRight'), new Tyre('BackRight')];
        $this->lowLights = [new LowBeam('left'), new LowBeam('right')];
        $this->highLights = [new HighBeam('left'), new HighBeam('right')];
        $this->accumulator = new Accumulator(26);
    }

    public function drive(int $distance = 10): void {
        if ($this->fuelGauge->getFuel() <= 0 || $this->isActive == false) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
        foreach ($this->allTyres as $one) {
            $one->decreaseUsage();
        }
        if ($this->dayTime == 'day') {
            foreach ($this->lowLights as $oneLight) {
                $oneLight->decreaseCondition();
            }
        } else {
            foreach ($this->highLights as $oneLight) {
                $oneLight->decreaseCondition();
            }
        }
    }

    public function setCarActive(): string {
        if ($this->accumulator->getCondition() < 25) {
            return "Cant start. Low energy." . PHP_EOL;
        } else {
            $this->isActive = true;
            return "Car started." . PHP_EOL;
        }
    }

    public function getName(): string {
        return $this->name;
    }

    public function getFuel(): float {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int {
        return $this->odometer->getMileage();
    }

    public function getTyreReview(): string {
        $result = '';
        foreach ($this->allTyres as $one) {
            $result .= $one->getReview() . ' | ';
        }
        return $result . PHP_EOL;
    }

    public function checkCondition(): string {
        $resultTwo = '';
        foreach ($this->allTyres as $one) {
            $resultTwo .= $one->checkCondition();
        }
        if (strlen($resultTwo) == 0) return $resultTwo;
        echo $resultTwo . PHP_EOL;
        exit;
    }

    public function getLowBeamReview(): string {
        $result = 'LowBeam: ';
        foreach ($this->lowLights as $light) {
            if ($light->condition <= 0) echo "No vision. Can`t drive." . exit;
            $result .= $light->getBeamReview() . ' | ';
        }
        return $result . PHP_EOL;
    }

    public function getHighBeamReview(): string {
        $result = 'HighBeam: ';
        foreach ($this->highLights as $light) {
            if ($light->condition <= 0) echo "No vision. Can`t drive." . exit;
            $result .= $light->getBeamReview() . " | ";
        }
        return $result . PHP_EOL;
    }
}