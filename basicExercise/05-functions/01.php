<?php

function stringPlusCodelex(): string {
    $newString = readline("Input new string: ");
    return $newString . ' codelex' . PHP_EOL;
}

echo stringPlusCodelex();