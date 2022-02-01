<?php

class BlackPeter {

    private Deck $deck;

    public function __construct() {
        $this->deck = new Deck();
    }

    public function getDeck(): Deck {
        return $this->deck;
    }

    public function deal(): Card {
        return $this->deck->draw();
    }

    public static function equalCards(Card $firstCard, Card $secondCard): bool {
        return $firstCard->getSymbol() === $secondCard->getSymbol();
    }

    public function printCards($player): void {

        foreach ($player->getCards() as $card) {
            echo '| ' . $card->getDisplayValue() . ' |';
        }
        echo PHP_EOL;
    }

    public function checkWinner(Player $player): bool {
        if (count($player->getCards()) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
