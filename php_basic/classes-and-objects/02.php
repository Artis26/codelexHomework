<?php
class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function swapPoints(Point $point1, Point $point2): string {
    $temp = $point1;
    $point1 = $point2;
    $point2 = $temp;
    return "(" . $point1->x . ", " . $point1->y . ")" . "\n" . "(" . $point2->x . ", " . $point2->y . ")";
}

$p1 = new Point(5,2);
$p2 = new Point(-3, 6);
echo swapPoints($p1, $p2);
