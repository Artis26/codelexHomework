<?php

$personsData = explode(',', file_get_contents('Store/buyer.txt'));

$persons = new stdClass();
$persons->name = $personsData[0];
$persons->cash = (int)$personsData[1];

function createProduct(string $name, int $price, string $category, string $description, string $date, int $amount): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->description = $description;
    $product->date = $date;
    $product->amount = $amount;
    return $product;
}

$products = [];
if (($handle = fopen("Store/products.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        [$name, $price, $category, $description, $date, $amount] = $data;
        $products[] = createProduct($name, $price, $category, $description, $date, $amount);
    }
    fclose($handle);
}

$basket = [];

if(file_exists('Store/lastCart.txt')){
    $basket = explode(',', file_get_contents('Store/lastCart.txt'));
}


while (true) {

    echo '[1] See list of items' . PHP_EOL;
    echo '[2] Select single product info' . PHP_EOL;
    echo '[3] Checkout' . PHP_EOL;
    echo '[Any] Exit && Save basket' . PHP_EOL;

    $option = (int)readline('Select an option: ');

    switch ($option) {
        case 1: //add product
            foreach ($products as $index => $product) {
                echo "[$index] {$product->name} {$product->price}$ " . PHP_EOL;
            }

            $selectedProductIndex = (int)readline('Select product: ');

            $productToBuy = $products[$selectedProductIndex] ?? null;

            if ($productToBuy == null) {
                echo 'Product not found';
            }

            if ($persons->cash < $productToBuy->price) {
                echo 'Not enough cash' . PHP_EOL;
                exit;
            }

            $basket[] = $selectedProductIndex;

            echo "Added {$productToBuy->name} to basket." . PHP_EOL;
            break;

        case 2: //product info
            foreach ($products as $index => $selectedProduct) {
                echo "[$index] {$selectedProduct->name}" . PHP_EOL;
            }

            $selectedProduct = (int)readline('Select product: ');

            $productToBuy = $products[$selectedProduct] ?? null;

            if ($productToBuy == null) {
                echo 'Product not found';
            }

            echo "Inspecting [$index] {$productToBuy->name} :" . PHP_EOL;
            echo "[$index] Name: {$productToBuy->name} | Price: {$productToBuy->price}$ | Category: {$productToBuy->category} | " .
                "Description: {$productToBuy->description} | Expiring date: {$productToBuy->date} | Amount: {$productToBuy->amount}" . PHP_EOL;
            echo "\n";
            break;

        case 3: //checkout
            $totalSum = 0;
            foreach ($basket as $productIndex) {
                $product = $products[$productIndex];
                $totalSum += $product->price;
                echo $product->name . PHP_EOL;
            }
            echo '------------------' . PHP_EOL;
            echo "Total: $totalSum$" . PHP_EOL;

            if ($persons->cash >= $totalSum) {
                $persons->cash -= $totalSum;

                echo 'Purchase successful!' . PHP_EOL;
            } else {
                echo 'Payment failed. Not enough cash.' . PHP_EOL;
            }

            if(file_exists('Store/lastCart.txt')){
                unlink('Store/lastCart.txt');
            }

            exit;

        default: //save & exit
            echo 'Basket saved!' . PHP_EOL;
            $productIndexes = implode(',', $basket);
            file_put_contents('Store/lastCart.txt', $productIndexes);
            exit;
    }
}
