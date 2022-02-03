<?php

class VideoStore {
    private Video $video;
    private array $inventory;
    private array $rentedVideos;

    public function __construct($inventory) {
        $this->inventory = $inventory;
    }

    public function addNewVideo(): Video {
        $title = readline("Enter movie title ");
        return $this->inventory[] = new Video($title);
    }

    public function rentVideo(): string {
        $nr = 0;
        echo $this->listAllVideos();

        $choice = readline("Choose movie to rent: ");

        foreach ($this->inventory as $one) {
            switch ($choice) {
                case ($nr+=1):
                $videoToRent = $one;
                break;
            }
        }

        var_dump($videoToRent);

        if (($key = array_search($videoToRent, $this->inventory)) !== false) {
            if ($this->inventory[$key]->isAvailable() == false) return "Unavailable";
            $this->rentedVideos[] = $this->inventory[$key];
            $this->inventory[$key]->setAvailability();
            return "You rented " . "{$videoToRent->getTitle()}";
        }
        return "Such movie doesnt exist";
    }

    public function returnVideo() {
        if (empty($this->rentedVideos) == true) return "Nothing to return.";
        $nr = 0;
        $i = 1;
        foreach ($this->rentedVideos as $one) {
            echo "[$i]" . '"' . $one->getTitle() . '"';
            $i++;
        }

        $choice = readline("Choose movie to return: ");

        foreach ($this->rentedVideos as $oneR) {
            switch ($choice) {
                case ($nr+=1):
                    $videoToReturn = $oneR;
                    break;
            }
        }

        if (($key = array_search($videoToReturn, $this->rentedVideos)) !== false) {
            $this->rentedVideos[$key]->setAvailability();
            unset($this->rentedVideos[$key]);
        }
        return "You have returned " . $videoToReturn->getTitle();
    }

    public function listAllVideos(): string {
        $head = "[Nr][ Title | Availability | Rating ]";
        $result = '';
        $i = 1;
        foreach ($this->inventory as $one) {
            $result .= "[$i]" . '[ "' . $one->getTitle() . '" | ' . $one->getAvailability() . ' | ' .
                $one->getRating() . ' ]' . PHP_EOL;
            $i++;
        }
        return $head . PHP_EOL .$result;
    }
}
