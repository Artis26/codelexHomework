<?php

class Video {
    private string $title;
    private ?float $rating;
    private bool $available;

    public function __construct(string $title, bool $available = true, ?float $rating = null) {
        $this->title = $title;
        $this->rating = $rating;
        $this->available = $available;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function isAvailable(): bool {
        return $this->available;
    }

    public function getAvailability(): string {
        if ($this->available == true) return "Available";
        return "Unavailable";
    }

    public function getRating(): string {
        if ($this->rating == null) return "N/A";
        return $this->rating . '%';
    }

    public function setAvailability(): bool {
        if ($this->available == false) return $this->available = true;
        return $this->available = false;
    }

    public function returnVideo(): bool {
        return $this->available = true;
    }

    public function rateVideo(): float {
        return $this->rating = readline("Rate video (0%-100%): ");
    }
}