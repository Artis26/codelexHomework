<?php
class Product {
    private string $name;
    private float $startPrice;
    private int $amount;

    function __construct(string $name, float $startPrice, int $amount) {
        $this->name = $name;
        $this->amount = $amount;
        $this->startPrice = $startPrice;
    }

    function printProduct(): string
    {
        return "[Name] $this->name, [Price] $this->startPrice$, [Amount] $this->amount." . PHP_EOL;
    }

    function changePrice(): float {
        return $this->startPrice = readline("Enter new price: ");
    }

    function changeQuantity(): int {
        return $this->amount = readline("Enter new amount: ");
    }
}

$mouse = new Product("Logitech mouse", 70.00, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$projector = new Product("Epson EB-U05", 440.46, 1);


while (true) {

    echo "Choose a product: \n [1] Mouse \n [2] Phone \n [3] Projector \n [4] Exit" . PHP_EOL;
    $optionChosen = readline("Choose product: ");

    if ($optionChosen == 1) {
        $product = $mouse;
    } else if ($optionChosen == 2) {
        $product = $phone;
    } else if ($optionChosen == 3) {
        $product = $projector;
    } else {
        exit;
    }

    echo $product->printProduct();

    echo "Would you like to: \n [1] Change quantity \n [2] Change price \n [3] Exit" . PHP_EOL;
    $optionChosenTwo = readline('Choose option: ');
    switch ($optionChosenTwo) {
        case 1:
            $product->changeQuantity();
            break;
        case 2:
            $product->changePrice();
            break;
        default:
            break;
    }
}


