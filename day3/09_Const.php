<?php

class Car{

    const Wheels = '4';

    public function get_wheels(){
            return self::Wheels;
    }
}

echo "Wheels: " . Car::Wheels . "<br />" ;
$car = new Car();
echo $car->get_wheels(); 

?>