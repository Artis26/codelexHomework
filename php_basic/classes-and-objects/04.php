<?php

class Movie {
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function printMovies(array $movieList): string {
        $result = '';
        foreach ($movieList as $one) {
            $result .= "[Title] $one->title [Studio] $one->studio [Rating] $one->rating" . PHP_EOL;
        }
        return $result;
    }

    public static function getPG(array $movies):array {
        $onlyPG = [];
        foreach ($movies as $one) {
            if ($one->rating == 'PG') {
                $onlyPG[] = $one;
            }
        }
        return $onlyPG;
    }
}

$movieArray = [new Movie("Casino Royal", "Eon Productions", "PG13"),
    new Movie("Glass","Buena Vista International","PG13"),
    new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG")];

$PGRated = Movie::getPG($movieArray);
echo Movie::printMovies($PGRated);