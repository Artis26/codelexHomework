<?php

abstract class Symbols {
    public static function getLetterSymbols(): array {
        return [3 => 'A', 4 => 'B', 5 => 'C', 10 => 'D'];
    }

    public static function getSpecialSymbols(): array {
        return [3 => '#', 4 => '@', 5 => '*', 10 => '$'];
    }
}