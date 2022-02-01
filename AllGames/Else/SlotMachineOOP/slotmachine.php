<?php

class slotMachine {
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
