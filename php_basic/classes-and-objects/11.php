<?php
class BankAccount {
    private float $balance;
    private string $name;

    public function __construct(string $name, float $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBalance(): string {
        return $this->balance . "$";
    }

    public function depositMoney($amount): float {
        return $this->balance += $amount;
    }

    public function withdrawMoney($amount): float {
        return $this->balance -= $amount;
    }

    public static function transfer(BankAccount $from, BankAccount $to, float $howMuch): void {
        $to->depositMoney($from->withdrawMoney($howMuch));
    }
}

$A = new BankAccount("A", 100.00);
$B = new BankAccount("B", 0);
$C = new BankAccount("C", 0);
echo $A->getBalance() . PHP_EOL;
echo $B->getBalance() . PHP_EOL;
echo $C->getBalance() . PHP_EOL;
echo "=-=-=-=-=" .PHP_EOL;
BankAccount::transfer($A, $B, 50.00);
echo $A->getBalance() . PHP_EOL;
echo $B->getBalance() . PHP_EOL;
echo $C->getBalance() . PHP_EOL;
echo "=-=-=-=-=" .PHP_EOL;
BankAccount::transfer($B, $C, 25.00);
echo $A->getBalance() . PHP_EOL;
echo $B->getBalance() . PHP_EOL;
echo $C->getBalance() . PHP_EOL;
