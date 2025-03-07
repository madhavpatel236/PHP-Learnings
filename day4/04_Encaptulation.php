<?php

class user{

    private $name;

    public function set_name($name){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }
}

$obj = new user();
$obj-> set_name("madhav");
echo $obj -> get_name();
?>

