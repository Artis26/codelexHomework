<?php
class Date {
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $day, int $month, int $year) {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function printDate(): string {
        return "$this->day/$this->month/$this->year" . PHP_EOL;
    }
}

$allDates = [new Date(26, 12, 2001), new Date(2, 6, 2012)];

foreach ($allDates as $single) {
    echo $single->printDate();
}
