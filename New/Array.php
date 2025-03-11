<!-- array_combine -->
<!-- array_count_values -->
<!-- array_merge -->
<!-- array_diff -->
<!-- array_push -->

<?php
// $fruits = array("apple", "orange", array("pear", "mango"),"banana" );
// echo (count($fruits,1));


// Array: 
$fname = array("A", "cat", "dog", "A", "dog");
$age = array("A", "A", "cat", "A", "tiger");
$c = array_combine($fname, $age);
$d = array_count_values($c);
print_r($c);
echo "<br/>";
print_r($d);
echo "<br/>";
$arrayMerge =  array_merge($fname, $age);
print_r($arrayMerge);
echo "<br/>";


$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue", "h" => "orange");
$a3 = array("d" => "orange");

$a4 = array_merge($a2, $a3);
print_r($a4);
echo "<br/>";

$result = array_diff($a1, $a4); // $a4 = Array ( [e] => red [f] => green [g] => blue [h] => orange [d] => orange ) 
print_r($result); // $result = Array ( [d] => yellow ) 
echo "<br/>";

$push = array_push($a1, $a2);
print_r($push);
echo "<br/>";
