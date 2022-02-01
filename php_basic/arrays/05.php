<?php
$gameFile = file_get_contents('arrays/default.txt');
$gameFile = (explode('
', $gameFile));

//$playerOne = readline("Enter Your symbol Player 1: ");
//$playerTwo = readline("Enter Your symbol player 2: ");
$player1 = 'X';
$player2 = '0';
$activePlayer = $player1;

$toTriplets = [];
$combinations2 = [];

function getCombinations(array $gameFile):array {
    $noLetters = preg_replace('/[^0-9.,;|]+/', '', $gameFile[1]);

    $combos[] = explode('|', $noLetters);

    foreach ($combos as $combo) {
        foreach ($combo as $cmb) {
            //var_dump($cmb);
            $toTriplets[] = explode(';', $cmb);
        }
    }

    foreach ($toTriplets as $oneTriplet) {
        $combinations2[] = array_map(function($val) {
            return explode(',', $val);
        }, $oneTriplet);
    }

    array_walk_recursive($combinations2, function(&$item) {
        if (is_numeric($item)) {
            $item = intval($item);
        }
    });
    return $combinations2;
}

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }
    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

$newBoard = [];
function getBoard(array $newBoard,array $gameFile):array {
    $cleanValues = preg_replace('/[^0-9]+/', '', $gameFile[0]);
    $new = str_split($cleanValues);
    $rowLength = $new[0];
    $colLength = $new[1];

    for ($r = 0; $r < $rowLength; $r++) {
        for ($c = 0; $c < $colLength[$r]; $c++) {
            $newBoard[] = array_fill(0,$rowLength, '-');
        }
    }
    return $newBoard;
}
$board = getBoard($newBoard, $gameFile);

//$board = [
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//];


function drawBoard(array $board): void
{
    for ($row = 0; $row < count($board); $row++) {
        for ($col = 0; $col < count($board[$row]); $col++) {
            echo $board[$row][$col] . " ";
        }
        echo "\n";
    }
}

$combinations = getCombinations($gameFile);

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    drawBoard($board);
    $position = readline("Player [$activePlayer] Enter your position: ");
    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
        drawBoard($board);
        echo "Winner is [$activePlayer] !!!";
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;