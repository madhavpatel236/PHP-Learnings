<?php

echo "Control Statement in PHP";
echo "<br>";

$name = 'madhav';

// if-else
if ($name == 'madhav') {
    echo "Hello $name";
    echo "<br>";
} else if ($name == 'parth') {
    echo "Hello $name";
    echo "<br>";
} else {
    echo "You are not allowed";
    echo "<br>";
}

$age = 28;

// swich-case
switch ($age) {
    case ($age < 18):
        echo "Your age is less then 18";
        echo "<br>";
        break;
    case ($age == 18):
        echo "Your age is 18";
        echo "<br>";
        break;
    case ($age > 18):
        echo "Your age is more then 18";
        echo "<br>";
        break;
    default:
        echo "Your age is not valid";
        echo "<br>";
        break;
}


switch ($user_role):
    case "admin":
        include "admin.php";
        break;
    case "editor":
        include "editor.php";
        break;
endswitch;




?>