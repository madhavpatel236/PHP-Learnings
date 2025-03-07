<?php

class Details
{
    protected $name;
    protected $age;
    protected $bonus;
    protected $salary;

    public function displayInfo($designation)
    {
        echo "$designation  Name: " . $this->name . " <br/> $designation Age: " . $this->age . " <br /> $designation Salary:" . $this->salary . "<br/> $designation  Bonus: " . $this->bonus .  "<br /> <br/>";
    }
    public function set_values($name, $age, $salary, $bonus)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->bonus = $bonus;
    }
}

$obj = new Details();
$obj->set_values("Madhav", 20, 100000, 12345);;
$obj->displayInfo('Employee');

$obj->set_values("parth", 33, 10000, 5000);
$obj->displayInfo('Developer');

$obj->set_values("one", 50, 200000, 100000);
$obj->displayInfo('Manager');
