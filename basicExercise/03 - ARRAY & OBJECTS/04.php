<?php
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
var_dump($items);
$person = $items[0][1];
echo $person['name'] . ' ' . $person['surname'] . ' ' . $person['age'];




