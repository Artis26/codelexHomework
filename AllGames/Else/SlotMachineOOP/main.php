<?php

require_once ("game.php");
require_once ("combinations.php");
require_once ("symbols.php");
require_once ("slotmachine.php");

$game = new Game();
$columns = $game->chooseCols();
$symbols = $game->chooseSymbols();
$totalSum = $game->setTotalSum();
$gamePrice = $game->setGamePrice();
$amountOfSpins = $game->setSpinCount();

while ($amountOfSpins !== 0) {
    $slots = [];
    $letterSlots = new slotMachine(3, count($columns['row1']), $slots);
    $letterSlots->getSlotMachine($symbols);
    $combinationsTrue = $letterSlots->checkWinner($symbols, $columns);
    $winAmount = $letterSlots->calculateWinnings($combinationsTrue, $symbols, $gamePrice);
    $totalSum -= $gamePrice * $letterSlots->getRows();
    if ($winAmount > 0) {
        $totalSum += $winAmount;
        echo "You won $winAmount $.\nYour total amount is $totalSum $." . PHP_EOL;
    } else {
        echo "You lost. Total: $totalSum" . PHP_EOL;
    }
    $amountOfSpins--;

    if ($totalSum < $gamePrice * $letterSlots->getRows()) {
        echo "Not enough money. :(" . PHP_EOL;
        exit;
    }

    while ($amountOfSpins == 0) {
        echo '[1] Yes' . PHP_EOL;
        echo '[2] Change game settings' . PHP_EOL;
        echo '[3] Exit. ' . PHP_EOL;
        $playMore = readline('Want to spin more? ');

        switch ($playMore) {
            case 1:
                $amountOfSpins = readline('Enter amount of spins you want to take: ');
                break;
            case 2:
                echo '[1] Change game price' . PHP_EOL;
                echo '[2] Change symbols' . PHP_EOL;
                echo '[3] Change column count' . PHP_EOL;
                echo '[4] Close' . PHP_EOL;
                $options = readline("Choose option: ");
                switch ($options) {
                    case 1:
                        $gamePrice = $game->setGamePrice();
                        break;
                    case 2:
                        $symbols = $game->chooseSymbols();
                        break;
                    case 3:
                        $columns = $game->chooseCols();
                        break;
                    default:
                        echo 'Close' . PHP_EOL;
                        break;
                }
                break;
            default:
                exit;
        }
    }
}





