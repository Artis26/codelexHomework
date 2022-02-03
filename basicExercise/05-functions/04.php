<?php

$persons = [(object)['name' => 'Janis', 'surname' => 'Ozols', 'age' => 19],
    (object)['name' => 'Edgars', 'surname' => 'Skapis', 'age' => 17]];

function checkIfAdult($persons): string {
    if ($persons->age >= 18) {
        return "Person is an adult!" . PHP_EOL;
    } else {
        return "Person is under age!" . PHP_EOL;
    }
}

foreach ($persons as $person ) {
    echo checkIfAdult($person);
}
