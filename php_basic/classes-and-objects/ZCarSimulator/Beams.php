<?php
class LowBeam {
    protected string $name;
    public int $condition;

    public function __construct(string $name, int $condition = 100) {
        $this->name = $name;
        $this->condition = $condition;
    }

    public function decreaseCondition(): void {
        $this->condition -= rand(1,2);
    }

    public function getBeamReview(): string {
        return "$this->name $this->condition%";
    }
}

class HighBeam
{
    private string $name;
    public int $condition;

    public function __construct(string $name, int $condition = 100) {
        $this->name = $name;
        $this->condition = $condition;
    }

    public function decreaseCondition(): void {
        $this->condition -= rand(2,3);
    }

    public function getBeamReview(): string {
        return "$this->name $this->condition% ";
    }
}
