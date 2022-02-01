<?php
$playerMove = '';
$continue = true;

$winningConditions = [
    'Paper' => ['Rock', 'Spock'],
    'Rock' => ['Scissors', 'Lizard'],
    'Scissors' => ['Papers', 'Lizard'],
    'Lizard' => ['Spock','Paper'],
    'Spock' => ['Rock, Scissors']
];

while ($continue == true) {
    $moves = ['Rock', 'Paper', 'Scissors', 'Lizard', 'Spock'];
    $computerMove = $moves[array_rand($moves)];
    var_dump($computerMove);

    echo '=-=-=-=-=-=-=-=-=' . PHP_EOL;
    echo "[1] Rock" . PHP_EOL;
    echo "[2] Paper". PHP_EOL;
    echo "[3] Scissors" . PHP_EOL;
    echo "[4] Lizard" . PHP_EOL;
    echo "[5] Spock" . PHP_EOL;
    $playerOne = readline("Enter your move: ");

    switch ($playerOne) {
        case 1:
            $playerMove = 'Rock';
            break;
        case 2:
            $playerMove = 'Paper';
            break;
        case 3:
            $playerMove = 'Scissors';
            break;
        case 4:
            $playerMove = 'Lizard';
            break;
        case 5:
            $playerMove = 'Spock';
            break;
        default:
            echo 'Invalid option.';
            echo 'Round lost.';
    }

    $gameResult = checkConditions($winningConditions, $playerMove, $computerMove);
    echo "[P1]-$playerMove |vs| [AI]-$computerMove" . PHP_EOL;
    echo $gameResult;

    file_put_contents('Games/GameLog.txt',"[P1]-$playerMove |vs| [AI]-$computerMove" . " >$gameResult", FILE_APPEND | LOCK_EX);

    echo '=-=-=-=-=-=-=-=-=' . PHP_EOL;
    echo '[1] Yes' . PHP_EOL;
    echo '[Any] No' . PHP_EOL;
    $playAgain = readline('Want to play again?');

    switch ($playAgain) {
        case 1:
            $continue = true;
            break;
        default:
            echo 'That`s all.' . PHP_EOL;
            exit;
    }
}

function checkConditions($winningConditions, $playerMove, $computerMove): string {
    if ($playerMove === $computerMove) {
        return 'TIE' . PHP_EOL;
    }

    if (in_array($computerMove, $winningConditions[$playerMove])) {
        $result = 'PLAYER wins!' . PHP_EOL;
    } else {
        $result = 'COMPUTER wins!' . PHP_EOL;
    }
    return $result;
}

