<?php

trait one{
    public function first_one(){
        echo " This is a first Trait <br /> ";
    }
    protected function empty(){}
}

trait two{
    public function Second_one(){
        echo " This is a second Trait <br /> ";
    }
}

class Explore{
    use one;
    use two;

    public function empty(){
        echo 'This is a abstact method in the trait one, which is implement in the child call. <br/> ';
    }
}


$try = new Explore;
$try -> first_one();
$try -> empty();
$try -> Second_one();



?>