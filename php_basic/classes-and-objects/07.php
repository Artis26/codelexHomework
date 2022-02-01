<?php
class Dog {
    public string $name;
    public string $sex;
    private ?string $father;
    public ?string $mother;

    public function __construct(string $name, string $sex, string $father = null, string $mother = null) {
        $this->name = $name;
        $this->sex = $sex;
        $this->father = $father;
        $this->mother = $mother;
    }

    public function getFathersName(): string {
        if ($this->father == null) return "$this->name`s father is: Unknown";
        return "$this->name`s father is: $this->father";
    }

    public function getMothersName(): string {
        return $this->mother;
    }

    public function hasSameMother(Dog $otherDog): string {
        if ($this->mother == null) return "$this->name mother unknown. Impossible to tell.";
        if ($otherDog->mother == null) return "$otherDog->name mother unknown. Impossible to tell.";

        if ($this->mother == $otherDog->mother) {
            return "Same mother";
        } else {
            return "Different mother";
        }
    }

}

class DogTest {
    public Dog $dog;
    public array $allDogs;

    public function __construct() { //key for reference to dog. Should use ID, in case for same names.
        $this->allDogs = ["Max" => new Dog("Max", 'male', "Rocky", "Lady"),
            "Rocky" => new Dog( "Rocky", 'male', "Sam", "Molly"),
            "Sparky" => new Dog("Sparky", 'male'),
            "Buster" => new Dog("Buster", 'male', "Sparky", "Lady"),
            "Sam" => new Dog("Sam", 'male'),
            "Lady" => new Dog("Lady", 'female'),
            "Molly" => new Dog("Molly", 'female'),
            "Coco" => new Dog("Coco", "female","Buster", "Molly")];
    }
}

$newDogTest = new DogTest();

foreach ($newDogTest->allDogs as $one) {
    echo $one->getFathersName() . PHP_EOL;
}

echo $newDogTest->allDogs["Sparky"]->hasSameMother($newDogTest->allDogs["Sam"]);