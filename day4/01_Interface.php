<?php

interface Animal{
    public function animal_name();
}

class Dog implements Animal
{
    public $animalName = 'Dog';
    public function animal_name()
    {
        echo "Here we implement the Interface <br />";
        echo "Animal name is  " . $this->animalName . "<br />";
    }
}

class Cat implements Animal
{
    public $animalName = 'Cat';

    public function animal_name()
    {
        echo "Animal name is " . $this->animalName . "<br />";
    }
}

$dogRef = new Dog();
$dogRef->animal_name();

$catRef = new Cat();
$catRef->animal_name();


$animalArray = array('dogRef', 'catRef');

foreach ($animalArray as $animal) {
    echo $animal . ", <br />";
}
