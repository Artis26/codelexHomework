<?php

class Game {
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
