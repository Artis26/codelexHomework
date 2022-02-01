<?php

class slotMachine
{
    private array $slots;
    private int $rows;
    private int $cols;

    public function __construct(int $rows, int $cols, array $slots) {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->slots = $slots;
    }

    public function getRows(): int {
        return $this->rows;
    }

    public function getSlotMachine(array $symbols): void {
        for ($j = 0; $j < $this->rows; $j++) {
            $this_row = [];
            for ($k = 0; $k < $this->cols; $k++) {
                $this_row[] = $symbols[array_rand($symbols)];
            }
            $this->slots[] = $this_row;
        }

        for ($row = 0; $row < count($this->slots); $row++) {
            echo '[';
            for ($col = 0; $col < count($this->slots[$row]); $col++) {
                echo $this->slots[$row][$col];
                if ($col < $this->cols - 1) echo '|';
            }
            echo ']' . "\n";
        }
    }

    public function checkWinner(array $symbols, array $combinations): array {
        $result = [];
        foreach ($symbols as $symbol) {
            foreach ($combinations as $combination) {
                foreach ($combination as $item) {
                    [$row, $column] = $item;
                    if ($this->slots[$row][$column] !== $symbol) {
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

    public function calculateWinnings(array $winnings, array $symbols, float $gamePrice): float {
        $winAmount = 0;
        if (count($winnings) > 0) {
            foreach ($winnings as $letter) {
                $flippedSymbols = array_flip($symbols);
                $valueOfSymbol = $flippedSymbols[$letter];
                $winAmount += $valueOfSymbol * $this->rows;
                $winAmount *= $gamePrice;
            }
            return $winAmount;
        } else {
            return 0;
        }
    }
}

class Game
{
    public function setTotalSum(): float {
        return readline('Enter amount of money to play with: ');
    }

    public function setGamePrice(): float {
        return readline('Enter value of one row: ');
    }

    public function setSpinCount(): int {
        return readline('Enter amount of spins you want to take: ');
    }

    public function chooseSymbols(): array {
        echo "[1] Letters" . PHP_EOL;
        echo "[2] Special characters" . PHP_EOL;
        $choose = readline("Choose symbols: ");
        switch ($choose) {
            case 1:
                return Symbols::getLetterSymbols();
            case 2:
                return Symbols::getSpecialSymbols();
            default:
                echo "Invalid" . PHP_EOL;
                return $this->chooseSymbols();
        }
    }

    public function chooseCols(): array {
        echo "[1] 3 columns" . PHP_EOL;
        echo "[2] 4 columns" . PHP_EOL;
        echo "[3] 5 columns" . PHP_EOL;
        $chooseCol = readline("Choose column count: ");
        switch ($chooseCol) {
            case 1:
                return Combinations::threeOnThree();
            case 2:
                return Combinations::threeOnFour();
            case 3:
                return Combinations::threeOnFive();
            default:
                echo "Invalid" . PHP_EOL;
                return $this->chooseCols();
        }
    }
}

abstract class Symbols
{
    public static function getLetterSymbols(): array {
        return [3 => 'A', 4 => 'B', 5 => 'C', 10 => 'D'];
    }

    public static function getSpecialSymbols(): array {
        return [3 => '#', 4 => '@', 5 => '*', 10 => '$'];
    }
}

abstract class Combinations
{
    public static function threeOnThree(): array {
        return [
            'row1' => [
                [0, 0], [0, 1], [0, 2]
            ],
            'row2' => [
                [1, 0], [1, 1], [1, 2]
            ],
            'row3' => [
                [2, 0], [2, 1], [2, 2]
            ],
            'diag1' => [
                [0, 0], [1, 1], [2, 2]
            ],
            'diag2' => [
                [2, 0], [1, 1], [0, 2]
            ],
        ];
    }

    public static function threeOnFour(): array {
        return [
            'row1' => [
                [0, 0], [0, 1], [0, 2], [0, 3]
            ],
            'row2' => [
                [1, 0], [1, 1], [1, 2], [1, 3]
            ],
            'row3' => [
                [2, 0], [2, 1], [2, 2], [2, 3]
            ],
            'diag1' => [
                [0, 0], [1, 1], [2, 2], [2, 3]
            ],
            'diag2' => [
                [2, 0], [1, 1], [0, 2], [0, 3]
            ],
        ];
    }

    public static function threeOnFive(): array {
        return [
            'row1' => [
                [0, 0], [0, 1], [0, 2], [0, 3], [0, 4]
            ],
            'row2' => [
                [1, 0], [1, 1], [1, 2], [1, 3], [1, 4]
            ],
            'row3' => [
                [2, 0], [2, 1], [2, 2], [2, 3], [2, 4]
            ],
            'diag1' => [
                [0, 0], [1, 1], [2, 2], [2, 3], [2, 4]
            ],
            'diag2' => [
                [2, 0], [1, 1], [0, 2], [0, 3], [0, 4]
            ],
        ];
    }
}

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





