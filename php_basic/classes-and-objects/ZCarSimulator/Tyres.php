<?php
class Tyre
{
    private int $usage;
    private string $position;

    public function __construct(string $position, int $usage = 100) {
        $this->usage = $usage;
        $this->position = $position;
    }

    public function decreaseUsage(): int {
        $value = rand(1, 3);
        return $this->usage -= $value;
    }

    public function checkCondition(): string {
        $result = '';
        if ($this->usage <= 0) $result .= "$this->position tyre is dead.";
        return $result;
    }

    public function getReview(): string {
        return "$this->position $this->usage%";
    }
}