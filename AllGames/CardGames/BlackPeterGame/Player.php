<?php
class Player {
    private array $cards = [];
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCards(): array {
        return $this->cards;
    }

    public function addCard(Card $card): void {
        $this->cards[] = $card;
    }

    public function takeCard(Player $p1, Player $p2): void {
        $key = array_rand($p2->getCards(),1);
        $p1->cards[] = $p2->cards[$key];
        unset($p2->cards[$key]);
        $p1->disband();
        $p2->disband();
    }

    public function disband() {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol().$card->getColour();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol().$card->getColour() === (string) $symbol) {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i = 0; $i < 2; $i++) {
                    foreach ($this->cards as $index => $card) {
                        if ($card->getSymbol().$card->getColour() === (string)$symbol) {
                            unset($this->cards[$index]);
                            break;
                        }
                    }
                }
            }
        }
    }
}