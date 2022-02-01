<?php
class BankAccount {
    private string $name;
    private float $balance;

    public function __construct(string $name, string $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function show_user_name_and_balance(): string {
        if (strpos($this->balance,"-") !== false) {
            $newBalance = str_replace("-","", $this->balance);
            $result = "$this->name, -$" . number_format((float) $newBalance, 2, '.', ',');
        } else {
            $result = "$this->name, $" . number_format($this->balance, 2, '.', ',');
        }
        return $result;
    }
}

$ben = new BankAccount("Ben", -450.5);
$artis = new BankAccount("Artis", 400);
echo $ben->show_user_name_and_balance() . PHP_EOL;
echo $artis->show_user_name_and_balance() . PHP_EOL;