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
$person1 = $items[0][1];
$person2 = $items[0][0];
echo $person1['name'] . ' ' . $person1['surname'] . ' ' . $person1['age'] . '\n';
echo $person2['name'] . ' ' . $person2['surname'] . ' ' . $person2['age'];