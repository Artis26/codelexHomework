<?php
class Accumulator {
    private int $condition;

    public function __construct(int $condition) {
        return $this->condition = $condition;
    }

    public function getCondition(): int {
        return $this->condition;
    }
}