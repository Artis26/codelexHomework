<?php
$persons = new stdClass();
$persons-> name = 'Janis Ozols';
$persons-> license = ['#K12', '#L111', '#A001', '#S990'];
$persons-> cash = 5000;

function createGun(string $name, int $price, ?string $license = null): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$store = [
    createGun('Ak47', 5000, '#A001'),
    createGun('Deagle', 1000, '#K12'),
    createGun('GLock-18', 300, '#R1'),
    createGun('Knife', 500)
];

$basket = [];

while (true) {

    echo '[1] Add to basket' . PHP_EOL;
    echo '[2] Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $option = (int)readline('Select an option: ');

    switch ($option) {
        case 1:
            foreach ($store as $index => $gun) {
                echo "[$index] {$gun->name} ({$gun->license}) {$gun->price}$" . PHP_EOL;
            }

            $selectedWeapon = (int)readline('Select weapon: ');

            $weaponToBuy = $store[$selectedWeapon] ?? null;

            if ($weaponToBuy == null) {
                echo 'Weapon not found';
            }

            if ($weaponToBuy->license !== null && !in_array($weaponToBuy->license, $persons->license)) {
                if (!in_array($persons->license, $persons->license)) {
                    echo 'Invalid license.' . PHP_EOL;
                    exit;
                }
            }

            if ($persons->cash < $weaponToBuy->price){
                echo 'Not enough cash' . PHP_EOL;
                exit;
            }

            $basket[] = $weaponToBuy;

            echo "Added {$weaponToBuy->name} to basket." . PHP_EOL;
            break;

        case 2:
            $totalSum = 0;
            foreach ($basket as $gun) {
                $totalSum += $gun->price;
                echo $gun->name . PHP_EOL;
            }
            echo '------------------' . PHP_EOL;
            echo "Total: $totalSum$" . PHP_EOL;

            if ($persons->cash >= $totalSum) {
                echo 'Purchase successful!' . PHP_EOL;
            } else {
                echo 'Payment failed. Not enough cash.' . PHP_EOL;
            }
            break;
        default:
            exit;
    }
}

