<?php
class Employee
{
    protected $name = "John";
    protected $age = 25;
    private $salary = 50000;

    public function display_details() {}

    public function set_salary($data)
    {
        $this->salary = $data;
    }

    public function get_salary()
    {
        return $this->salary;
    }
}

class Manager extends Employee
{
    protected $bonus = 10000;

    public function displayManagerInfo()
    {
        echo "This is a manager. <br />";
    }

    public function display_details()
    {
        echo "Name: " . $this->name . ", Age: " . $this->age . ', salary: '  . $this->get_salary() . ", Bonus: " . $this->bonus . "<br />";
    }
}

class Developer extends Employee

{
    public $programming_language = "PHP";

    public function displayManagerInfo()
    {
        echo "This is a Developer. <br />";
    }

    public function display_details()
    {
        echo "Name: " . $this->name . ", Age: " . $this->age . ', salary: '  . $this->get_salary() . ", programming_language: " . $this->programming_language . " <br />";
    }
}

$emp = new Employee();
$emp->set_salary(1000);
echo $emp->get_salary();


$manager = new Manager();
$manager->display_details();


$developer = new Developer();
$developer->display_details();
$developer->displayManagerInfo();

