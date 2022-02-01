<?php
$minNum = 1;
$maxNum = 100;
$randomNum = rand($minNum,$maxNum);
echo "$randomNum - Just for test" . PHP_EOL;

$userGuess = readline('Enter Your guess: ');

if ($userGuess == $randomNum) {
   echo "You guessed it!  What are the odds?!?" . PHP_EOL;
} else if ($userGuess < $randomNum) {
    echo "Sorry, you are too low.  I was thinking of $randomNum." . PHP_EOL;
} else if ($userGuess > $randomNum) {
    echo "Sorry, you are too high.  I was thinking of $randomNum." . PHP_EOL;
}
