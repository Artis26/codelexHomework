<?php
class Survey {
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;


    public function __construct(int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks) {
    $this->surveyed = $surveyed;
    $this->purchased_energy_drinks = $purchased_energy_drinks;
    $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function getSurveyed(): int {
        return $this->surveyed;
    }

    public function calculate_energy_drinkers(): int {
        return round($this->surveyed * $this->purchased_energy_drinks);
    }

    public function calculate_prefer_citrus(): int {
        return round($this->surveyed * $this->prefer_citrus_drinks);
    }
}
$survey = new Survey(12467, 0.14,0.64);

echo "Total number of people surveyed " . $survey->getSurveyed() . PHP_EOL;
echo "Approximately " . $survey->calculate_energy_drinkers() . " bought at least one energy drink" . PHP_EOL;
echo $survey->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
