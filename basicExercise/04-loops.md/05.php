<?php
$people = [["name" => "Janis",
    "surname" => "Ozols",
    "age" => 25,
    "birthday" => "23.december"], ["name" => "Edgars",
    "surname" => "Skapis",
    "age" => 35,
    "birthday" => "14.may"]];

foreach ($people as $person) {
    echo "$person[name] $person[surname], $person[age], $person[birthday] !" . PHP_EOL;
}