<?php
require_once("Card.php");
require_once("Deck.php");
require_once("BlackPeter.php");
require_once("Player.php");

$game = new BlackPeter();
$player = new Player("Player1");
$npc = new Player("NPC");

for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}

echo "Player:";
$game->printCards($player);

echo "NPC:";
$game->printCards($npc);

$player->disband();
$npc->disband();

echo "-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;

while (true) {
    $player->takeCard($npc, $player);

    echo "Player: ";
    $game->printCards($player);
    echo "NPC: ";
    $game->printCards($npc);

    echo "-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;

    if ($game->checkWinner($player)) {
        echo "Player WINS!";
        exit;
    }

    if ($game->checkWinner($npc)) {
        echo "NPC WINS!";
        exit;
    }

    $player->takeCard($player, $npc);

    echo "Player:";
    $game->printCards($player);
    echo "NPC: ";
    $game->printCards($npc);

    echo "-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;

    if ($game->checkWinner($player)) {
        echo "Player WINS!";
        exit;
    }
    if ($game->checkWinner($npc)) {
        echo "NPC WINS!";
        exit;
    }
    sleep(1);
}


