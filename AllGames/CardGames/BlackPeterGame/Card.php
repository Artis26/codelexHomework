<?php

class Card {
    private ?string $colour;
    private string $suit;
    private string $symbol;

    public function __construct(string $suit, string $symbol, string $colour = null) {
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->colour = $this->setColour();
    }

    public function getSuit(): string {
        return $this->suit;
    }

    public function getSymbol(): string {
        return $this->symbol;
    }

    public function getColour(): ?string {
        return $this->colour;
    }

    public function setColour(): string {
        if ($this->getSuit() == '♢' || $this->getSuit() == '♡') return $this->colour = 'red';
        if ($this->getSuit() == '♣' || $this->getSuit() == '♠') return $this->colour = 'black';
    }

    public function getDisplayValue(): string {
        return "{$this->symbol}.{$this->suit}";
    }

}