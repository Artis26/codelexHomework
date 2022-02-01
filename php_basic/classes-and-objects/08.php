<?php

class SavingsAccount {
    private float $balance;
    private float $annualInterest;
    private float $totalDeposit = 0;
    private float $totalWithdrawn = 0;
    private float $interest = 0;

    public function __construct() {
        $this->balance = (float) readline("Enter your starting balance: ");
        $this->annualInterest = (float) readline("Enter the annual interest rate: ");
    }

    public function getBalance(): string {
        return "Total balance: $" . number_format($this->balance, 2, '.', ',');
    }

    public function getTotalDeposit(): string {
        return "Total deposited: $" . number_format($this->totalDeposit, 2, '.', ',');
    }

    public function getBTotalWithdraw(): string {
        return "Total withdrawn: $" . number_format($this->totalWithdrawn, 2, '.', ',');
    }

    public function getInterestEarned(): string {
        return "Total interest earned: $" . number_format($this->interest, 2, '.', ',');
    }

    public function deposit(): void {
        $add = readline("Enter amount deposited: ");
        $this->balance += $add;
        $this->totalDeposit += $add;
    }

    public function withdraw(): void {
        $take = readline("Enter amount withdrawn: ");
        $this->balance -= $take;
        $this->totalWithdrawn += $take;
    }

    public function addMonthlyInterest(): void {
        $monthly = $this->annualInterest / 12;
        $this->interest += $this->balance * $monthly;
        $this->balance += $this->balance * $monthly;
    }
}

$new = new SavingsAccount();
$timeOpened = (int) readline("How many months has the account been opened?");

for ($i = 1; $i <= $timeOpened; $i++) {
    echo "Month $i:" . PHP_EOL;
    $new->deposit();
    $new->withdraw();
    $new->addMonthlyInterest();
}

echo $new->getBTotalWithdraw() . PHP_EOL;
echo $new->getTotalDeposit() . PHP_EOL;
echo $new->getInterestEarned() . PHP_EOL;
echo $new->getBalance(). PHP_EOL;

