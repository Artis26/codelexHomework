<?php

class Geometry
{
    public static function CircleArea()
    {
        $r = readline("Enter radius of circle: ");
        if ($r < 0) {
            return "ERROR - Cant be negative";
        }
            $area = pi() * $r * 2;
            return $area . PHP_EOL;
    }

    public static function RectangleArea()
    {
        $length = readline("Enter length of rectangle:");
        $width = readline("Enter width of rectangle:");
        if ($length < 0 || $width < 0) {
            return "ERROR - Cant be negative";
        }
        $area = $length * $width;
        return $area . PHP_EOL;
    }

    public static function TriangleArea()
    {
        $base = readline("Enter base of triangle:");
        $hight = readline("Enter hight of triangle:");
        if ($base < 0 || $hight < 0) {
            return "ERROR - Cant be negative";
        }
        $area = $base * $hight * 0.5;
        return $area . PHP_EOL;
    }
}

echo "Geometry calculator:

1. Calculate the Area of a Circle
2. Calculate the Area of a Rectangle
3. Calculate the Area of a Triangle
4. Quit" . PHP_EOL;

$userInput = readline("Enter your choice (1-4): ");

if ($userInput == 1) {
    echo Geometry::CircleArea();
} else if ($userInput == 2) {
    echo Geometry::RectangleArea();
} else if ($userInput == 3) {
    echo Geometry::TriangleArea();
} else if ($userInput == 4) {
    exit;
} else {
    echo "ERROR - Such option doesnt exist!" . PHP_EOL;
}


