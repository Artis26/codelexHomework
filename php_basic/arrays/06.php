<?php
$arrayOfWords = ["codelex", "projects", "moustache", "warrior"];

$randomKey = array_rand($arrayOfWords);
$randomWord = $arrayOfWords[$randomKey];
$arrWord = str_split($randomWord);

$mistakes = 0;
$result = '';
$guessArray = [];
$wrongLetters = '';

foreach ($arrWord as $randomChar) {
    $newFinal = $randomChar;
    $final = str_replace("$randomChar", "_", $newFinal);
    $result .= $final;
}
echo $result . PHP_EOL;


while (true) {

    $guess = readline('Enter a letter for guess: ');

    if ((in_array($guess, $arrWord))) {
        $result = '';
        $guessArray[] = $guess;
        foreach (str_split($randomWord) as $char) {
            if (in_array($char, $guessArray)) {
                $result .= $char;
            } else {
                $result .= '_';
            }
        }
    } else {
        $wrongLetters .= $guess;
        $mistakes++;
    }

    echo 'Misses: ' . $wrongLetters . PHP_EOL;
    echo $result . PHP_EOL;

    if ($result === $randomWord) {
        echo 'You WON!!!';
        return true;
    } else if ($mistakes >= 5) {
        echo 'You LOST!!!';
        return true;
    }
}
