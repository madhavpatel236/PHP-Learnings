<?php 

$a = 20;
$b = 10;

echo "The value of a + b is : " . ( $a + $b );
echo "<br>";

echo "The value of a - b is : " . ( $a - $b );
echo "<br>";

echo "The value of a / b is : " . ( $a / $b );
echo "<br>";

echo "The value of a * b is : " . ( $a * $b );
echo "<br>";

echo "The value of a % b is : " . ( $a % $b );
echo "<br>";

echo "The value of a ** b is : " . ( $a ** $b );
echo "<br>";


// Comperision Operators

echo ' comparition between a = b : ';
echo var_dump($a == $b);
echo "<br>";

// echo ' comparition between a > b is: ' . ($a > $b); false
echo ' comparition between a > b is: ';
var_dump($a > $b); 
echo "<br>";

echo ' comparition between a < b is: ';
var_dump($a < $b); 
echo "<br>";

echo ' comparition between a >= b is: ';
var_dump($a >= $b); 
echo "<br>";

echo ' comparition between a <> b is: ';
var_dump($a <> $b); 
echo "<br>";


// logical operators

$x = false;
$y = false;

echo 'comparition between x && y is: ' . var_dump($x && $y); // var_dump($x and $y);
echo "<br>";


echo 'comparition between x || y is: ' . var_dump($x || $y); // var_dump($x or $y);
echo "<br>"; 


echo 'comparition between !x: ' . var_dump(!$x); 
echo "<br>"; 



?>