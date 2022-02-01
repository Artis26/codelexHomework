<?php
$symbols = [3 => 'A', 4 => 'B', 5 => 'C', 10 => 'D'];
$numberOfRows = 3;
$numberOfCols = 5;
$gamePrice = 1;
$totalGamePrice = $gamePrice * $numberOfRows;
$winAmount = 0;

$combinations = [
    'row1' => [
        [0, 0], [0, 1], [0, 2]//,[0,3]
    ],
    'row2' => [
        [1, 0], [1, 1], [1, 2]//,[1,3]
    ],
    'row3' => [
        [2, 0], [2, 1], [2, 2]//,[2,3]
    ],
    'diag1' => [
        [0, 0], [1, 1], [2, 2]//,[2,3]
    ],
    'diag2' => [
        [2, 0], [1, 1], [0, 2]//,[0,3]
    ],
];

$totalSum = readline('Enter amount of money to play: ');
$amountOfSpins = readline('Enter amount of spins you want to take: ');
$gamePrice = readline('Enter value of one row: ');

while ($amountOfSpins !== 0) {

    $slotMachine = [];
//    $slotMachine = [
//        ['B', 'B','A','A'],
//        ['A', 'A','A','D'],
//        ['A', 'B','C','D'],
//
//    ];
    $slotMachine = getSlotMachine($slotMachine, $numberOfRows, $numberOfCols, $symbols);
    drawSlotMachine($slotMachine);

    if (count(winningCombos($combinations, $slotMachine, $symbols)) > 0) {
        foreach (winningCombos($combinations, $slotMachine, $symbols) as $letter) {
            $flippedSymbols = array_flip($symbols);
            $valueOfSymbol = $flippedSymbols[$letter];
            $winAmount += $valueOfSymbol * $numberOfRows;
            $winAmount *= $gamePrice;
        }
        $totalSum -= $totalGamePrice;
        $totalSum += $winAmount;
        echo "You won $winAmount $.\nYour total amount is $totalSum $." . PHP_EOL;

    } else {
        $totalSum -= $totalGamePrice;
        echo "LOST. Your total amount is $totalSum $." . PHP_EOL;
        if ($totalSum < $totalGamePrice) {
            exit;
        }
    }

    $amountOfSpins--;
    if ($amountOfSpins == 0) {
        echo '[1] Yes' . PHP_EOL;
        echo '[2] No. Exit. ' . PHP_EOL;
        $playMore = readline('Want to spin more? ');

        switch ($playMore) {
            case 1:
                $amountOfSpins = readline('Enter amount if spins you want to take: ');
                break;
            default:
                exit;
        }
    }
}

function getSlotMachine(array $slotMachine, int $numberOfRows, int $numberOfCols, array $symbols): array
{
    for ($j = 0; $j < $numberOfRows; $j++) {
        $this_row = [];
        for ($k = 0; $k < $numberOfCols; $k++) {
            $this_row[] = $symbols[array_rand($symbols)];
        }
        $slotMachine[] = $this_row;
    }
    return $slotMachine;
}

function drawSlotMachine(array $slotMachine): void
{
    for ($row = 0; $row < count($slotMachine); $row++) {
        for ($col = 0; $col < count($slotMachine[$row]); $col++) {
            echo $slotMachine[$row][$col] . " ";
        }
        echo "\n";
    }
}

function winningCombos(array $combinations, array $slotMachine, array $symbols): array
{
    $result = [];
    foreach ($symbols as $symbol) {
        foreach ($combinations as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;
                if ($slotMachine[$row][$column] !== $symbol) {
                    break;
                }
                if (end($combination) === $item) {
                    $winningCombination = (array_search($combination, $combinations));
                    $result[$winningCombination] = $symbol;
                }
            }
        }
    }
    return $result;
}
