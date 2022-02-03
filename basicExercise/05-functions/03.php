<?php
$persons = new stdClass();
$persons-> name = "Janis";
$persons-> surname = "Ozols";
$persons-> age = 19;

//function createPerson(string $name, int $age): stdClass {
//    $persons = new stdClass();
//    $persons->name = $name;
//    $persons->age = $age;
//    return $persons;
//}

function checkIfAdult(stdClass $persons): string {
    if ($persons->age >= 18) {
        return "Person is an adult!" . PHP_EOL;
     } else {
        return "Person is under age!" . PHP_EOL;
     }
}

echo checkIfAdult($persons);
