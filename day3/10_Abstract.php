<?php

abstract class car
{
    public $name;
    public function try()
    {
        echo " Try the non abstract function in the Abstract class. <br />";
    }
    abstract protected function get_name($name);
}

class BMW extends car
{
    public function get_name($name, $model = "Hello")
    {
        echo $model . " Car name is: " . $name . "<br />";
    }
}

class Defender extends car
{
    public function get_name($name)
    {
        echo " Car name is: " . $name . "<br />";
    }
}

$bmw = new BMW();
$bmw->get_name("BMW");
$bmw-> try(); 

$defender = new Defender();
$defender->get_name("Defender");
