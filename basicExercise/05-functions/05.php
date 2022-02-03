<?php
$fruits = [(object)['fruit' => 'Banana' , 'weight' => 11],(object)['fruit' =>'Apple', 'weight' => 15],
    (object)['fruit' => 'Chery', 'weight' => 7], (object)['fruit' => 'Orange', 'weight' => 2]];

$shipCost = (object)['small' => 1, 'big' => 2];

function checkFruits ($fruits, $shipCost): string {
        if ($fruits->weight > 10) {
            return 'To ship ' . $fruits->fruit . ' ' . 'cost is ' . $shipCost->big . '$!' . PHP_EOL;
        } else {
            return 'To ship ' . $fruits->fruit . ' ' . 'cost is ' . $shipCost->small . '$!' . PHP_EOL;
        }
}

foreach ($fruits as $eachFr) {
    echo checkFruits($eachFr, $shipCost);
}

