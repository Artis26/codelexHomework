<?php
$players = [['P1' => 0], ['P2' => 0], ['P3' => 0], ['P4' => 0]];
$racetrackLength = 20;
$track = '';
$minMove = 1;
$maxMove = 3;
$playerLogo = 'O';
$startLength = 0;
$winMultiple = 2;
$nr = 0;

chooseBet($players);
$betAmount = readline('Enter your bet amount: ');
$bet = readline('Choose: ');

foreach ($players as $key => $one) {
    $name = key($one);
    '[' . ($nr += 1) . '] ' . $name . PHP_EOL;
    switch ($bet) {
        case ($nr):
            $bet = $name;
            echo "Your lucky fella is -> $name" . PHP_EOL;
            break;
    }
}

function chooseBet(array $toBetOn)
{
    $nr = 0;
    foreach ($toBetOn as $key => $one) {
        $name = key($one);
        echo '[' . ($nr += 1) . '] ' . $name . PHP_EOL;
    }
}

function printTrack(int $length, string $logo, int $replaceLength): string
{
    $track = str_repeat('_', $length);
    return substr_replace($track, $logo, $replaceLength, 1);
}

$count = 0;
$raceGoing = true;
$winner = [];

while ($raceGoing = true) {
    $count++;
    foreach ($players as $key => &$player) {

        $randomMove = 0;
        $randomValue = rand($minMove, $maxMove);
        $randomMove += $randomValue;
        $players[$key][] = $randomMove;
        $move = array_sum($players[$key]);
        echo '[' . key($player) . '] ' . printTrack($racetrackLength, $playerLogo, $move) . PHP_EOL;

        if ($move >= 20 && !in_array(key($player), $winner)) {
            $winner += [key($player) => $count];
        }
    }
    if (count($winner) == 4) {
        $raceGoing = false;
        break;
    }
    echo '=-=-=-=-=-' . PHP_EOL;
    sleep(1);
}

$lastScore = 0;
$place = 0;
$realWinner = '';

foreach ($winner as $winKey => $win) {
    if ($lastScore !== $win) {
        echo ($place += 1) . '.place -> ' . $winKey . PHP_EOL;
        if ($place == 1 && $winKey == $bet) {
            $realWinner = $winKey;
        }
    } else {
        echo ($place += 0) . '.place -> ' . $winKey . PHP_EOL;
    }
    $lastScore = $win;
}

if (!empty($realWinner)) {
    echo $bet . ' won the race!' . PHP_EOL;
    echo "You won: " . ($betAmount * 2) . "$" . PHP_EOL;
} else {
    echo $bet . ' lost the race.' . PHP_EOL;
    echo "You lost $betAmount$";
}



