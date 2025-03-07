<?php

$name = "my name is madhav patel";

echo "$name";
echo "<br>";

echo strlen($name); // with the strlen() property we can find the length of the string.
echo "<br>";

echo "The length of $name is : " . strlen($name); // here we use the '.' for conceting the string and strlen() property.echo "<br>";

echo "variable word count is: " . str_word_count($name); // with the str_word_count() property we can find the word count of the string.
echo"<br>";

// echo strspn($name, "abc defghijklmnopqrstuvwxyz")

echo "Position of the 'is' in the variable: " . strpos($name,"is"); //  strpos() is use for finding the position of the perticuler string from the variable, It gives a starting position of that perticular string 
echo"<br>";


$a = 10;
$b = 20;

echo  var_dump($a == $b); 



?> 