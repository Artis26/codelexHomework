<?php
$persons = new stdClass();
$persons-> name = 'Janis Ozols';
$persons-> license = ['#K12', '#L111', '#A001', '#S990'];
$persons-> cash = 5000;

$guns = [(object)['name' => 'AK-47', 'licenseNr' => '#A001', 'price' => 4750],
    (object)['name' => 'LR-300', 'licenseNr' => '#L111', 'price' => 6000],
    (object)['name' => 'Revolver', 'licenseNr' => '#K12', 'price' => 1000],
    (object)['name' => 'Python Revolver', 'licenseNr' => '#K12', 'price' => 2500],
    (object)['name' => 'MP5A4', 'licenseNr' => '#M003', 'price' => 3500]];

function checkIfCanBuy(stdClass $persons, stdClass $guns): string {
        if (in_array($guns->licenseNr, $persons->license) && $persons->cash >= $guns->price) {
            return $guns->name . " is available for You - $persons->name!" . PHP_EOL;
        } else {
            return $guns->name . " is not available for You - $persons->name!" . PHP_EOL;
        }
}

foreach ($guns as $gun) {
    echo checkIfCanBuy($persons, $gun);
}



