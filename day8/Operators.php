<?php

$a = 40;
$b = 10;

echo "Arithmetic operators: <br/>";
echo  $a + $b . "<br/>";
echo  $a - $b . "<br/>";
echo  $a * $b . "<br/>";
echo  $a / $b . "<br/>";
echo  $a % $b . "<br/> <br/> ";


echo "Assignment operators: <br/>";
echo  $c = $b . "<br/>";
echo  $c = $a + $b . "<br/>";
echo  $c = $a - $b . "<br/>";
echo  $c = $a * $b . "<br/>";
echo  $c = $a / $b . "<br/>";
echo  $c = $a % $b . "<br/>";
echo "<br/>";



echo  "Comparison operators: <br/> ";
echo  $a == $b . "<br/>";
echo  $a != $b . "<br/>";
echo  $a !== $b . "<br/>";
echo  $a === $b . "<br/>";
echo  $a < $b . "<br/>";
echo  $a > $b . " <br/>";
echo  $a <=  $b . "<br/>";
echo  $a >= $b . "<br/>";
echo  $a <=> $b . "<br/>";
echo "<br/>";

echo "<br/>";
echo " Increment / Decrement Operators: <br/>";
echo ++$a . "<br/>";
echo --$a . "<br/>";
echo $a++ . "<br/>";
echo $a-- . "<br/>";
echo "<br/>";

echo "Logical Operators: ";
echo $a and $b . "<br/>";
echo $a or $b . "<br/>";
echo $a && $b . "<br/>";
echo $a || $b . "<br/>";
echo $a xor $b . "<br/>";
echo !$a . "<br/>";
echo "<br/>";

echo "String Operator: " . "<br/>";
echo $a . $b . "<br/>" ;
echo $a .= $b . "<br/>" ;
echo "<br/>";

echo "Conditional Assignment Operators: " . "<br/>" ;
echo $a ? $b : 0  ;
echo "<br/>";
echo $a ?? 0  ;
echo " <br/>";