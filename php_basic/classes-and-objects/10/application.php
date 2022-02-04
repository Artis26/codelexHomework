<?php

class Application {

    private VideoStore $videoStore;

    public function __construct() {
        $inventory = [new Video("The Matrix"), new Video("Godfather II"),
            new Video("Star Wars Episode IV: A New Hope")];
        $this->videoStore = new VideoStore($inventory);
    }

    function run() {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->videoStore->addNewVideo();
                    break;
                case 2:
                    echo $this->videoStore->rentVideo() . PHP_EOL;
                    break;
                case 3:
                    echo $this->videoStore->returnVideo() . PHP_EOL;
                    break;
                case 4:
                    echo $this->videoStore->listAllVideos() . PHP_EOL;
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }
}