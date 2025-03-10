<?php

$val = "This folder contains all the string method which we generally use. ";
echo "main given string is: " . $val . "<br/> <br/>" ;

// strlen($val)
// str_word_count($val)
// strrev($val)
// strpos($val , 'word' )
// str_repeat($val, 4)
// str_replace('folder', 'file', $val)
// str_split($val);
// str_shuffle($val);
// strcasecmp($val, 'madhav');
// strtoupper($val)
// strtolower($val)
// trim($val)

$length = strlen($val);
echo "Length of the given string is: " . $length . "<br/> <br/>" ;

$word_count = str_word_count($val);
echo "Total word in this given string is: " . $word_count . "<br/> <br/>";

$reverce = strrev($val);
echo "Reverce of the given string: " . $reverce . "<br/> <br/>";

$position= strpos( $val, 'contains' );
echo "position of the 'which' word in the given String is: " . $position . "<br/> <br/>" ;

$replace = str_replace( 'folder', 'file', $val );
echo 'Here we replace the word folder->file in the main given string: ' . $replace .  "<br/> <br/>" ;

$repeat = str_repeat($val, 2);
echo " here we will print a same string multiple times " .$repeat . "<br/> <br/>" ;

$split = str_split($val);
print_r($split);
echo  "<br/> <br/>";

$suffle = str_shuffle($val);
echo "this is the shuffle of the given string: " . $suffle .'<br/> <br/>';

$strcasecmp = strcasecmp($val, 'madhav'); // ASCII values are compared.
echo "This is compare the two strings (case insensitive), if result is 0->both are equal, if <0 -> string 1 is less then the string 2 or vice versa:  " . $strcasecmp . "<br/> <br/>" ;

$lower = strtolower($val);
echo "Convert the full string into the lower case: " .$lower . "<br/> <br/>" ;

$upper = strtoupper($val);
echo "convert the string into the upper case:  " .$upper . "<br/> <br/>" ;

$trim = trim($val);
echo "trim the white spaces at the beginnig and at the end from the given string: " .$trim . "<br/> <br/> " ;