<?php

class Game {
    public array $deck = [];
    private array $cards = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    private array $suits = ['♣', '♠', '♦', '♥'];
    public array $deskDeck = [];
    public array $playerDeck = [];

    public function createDeck() {
        foreach ($this->cards as $oneCard) {
            foreach ($this->suits as $oneSuit) {
                $this->deck[] = $oneCard . $oneSuit;
            }
        }
    }

    public function shuffleDeck() {
        for ($i = 0; $i < 3; $i++) {
            shuffle($this->deck);
        }
    }

    public function dealStartPlayer(): array {
        for ($i = 0; $i < 2; $i++) {
            $this->playerDeck[] = array_pop($this->deck);
        }
        return $this->playerDeck;
    }

    public function dealDesk(): array {
        for ($i = 0; $i < 2; $i++) {
            $this->deskDeck[] = array_pop($this->deck);
        }
        return $this->deskDeck;
    }

    public function printHand(array $hand): string {
        $result = '[';
        foreach ($hand as $one) {
            $result .= $one . " ";
        }

        return trim($result) . "]";
    }

    public function getCardPlayer(): string {
        return array_pop($this->deck);
    }

    private function readCardValue($card): int {
        $face = substr($card, 0, -1);
        $suit = substr($card, -1, 1);
        $numbers = '/[0-9]/';
        $roles = '/[JQK]/';
        if (preg_match($numbers, $face)) {
            return (int)$face;
        } else if (preg_match($roles, $face)) {
            return 10;
        } else {
            return 1;
        }
    }

    public function getHandValue($cards): int {
        $value = 0;
        foreach ($cards as &$values) {
            $value += $this->readCardValue($values);
        }
        return $value;
    }

    public function checkWinner($hand): string {
        if ($hand > 21) {
            echo "You lost. More then 21." . PHP_EOL;
            exit;
        } else if ($hand == 21) {
            echo "BLACKJACK! You win." . PHP_EOL;
            exit;
        }
        return "";
    }

    public function endWinner(int $playerScore, int $cpuScore ): string {
        echo "[Player] $playerScore" . PHP_EOL;
        echo "[CPU] $cpuScore" . PHP_EOL;
        if ($cpuScore > 21) {
            return "Player WINS!";
        } else if ($cpuScore == $playerScore) {
            return "TIE!";
        } else if ($playerScore > $cpuScore) {
            return "Player WINS";
        } else {
            return "CPU WINS!";
        }
    }
}

    $game = new Game();
    $game->createDeck();
    $game->shuffleDeck();

    $playerStart = $game->dealStartPlayer();
    echo $game->printHand($playerStart) . PHP_EOL;
    $playerMove = true;
    while ($playerMove == true) {
        echo "Total: " . $game->getHandValue($playerStart) . PHP_EOL;
        echo "[1] Get card" . PHP_EOL;
        echo "[2] End turn" . PHP_EOL;
        $option = readline("Your move: ");
        switch ($option) {
            case 1:
                $playerStart[] = $game->getCardPlayer();
                echo $game->printHand($playerStart) . PHP_EOL;
                echo $game->checkWinner($game->getHandValue($playerStart));
                break;
            default:
                $playerMove = false;
                break;
        }
    }
    echo "CPU TURN: " . PHP_EOL;
    $deskStart = $game->dealDesk();
    echo $game->printHand($deskStart) . PHP_EOL;
    while ($game->getHandValue($deskStart) < 17) {
        $deskStart[] = $game->getCardPlayer();
    }
    echo $game->printHand($deskStart) . PHP_EOL;
    echo "Results: " . PHP_EOL;
    echo $game->endWinner($game->getHandValue($playerStart),$game->getHandValue($deskStart));
