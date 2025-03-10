<?php


// $fruits = array("apple", "orange", array("pear", "mango"),"banana" );
// echo (count($fruits,1));


// Array: 
$fname = array("A", "cat", "dog", "A", "dog");
$age = array("A", "A", "cat", "A", "tiger");
$c = array_combine($fname, $age);
$d = array_count_values($c);
print_r($c);
print_r($d);
$arrayMerge =  array_merge($fname, $age);
print_r($arrayMerge);


$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue", "h" => "orange");
$a3 = array("i" => "orange");
$a4 = array_merge($a2, $a3);
$result = array_diff($a1, $a4);
print_r($result);


?>