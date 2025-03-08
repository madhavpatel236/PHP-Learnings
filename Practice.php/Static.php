<?php

// function incr() {
//     static $num = 0;
//     $num++;
//     return $num;
// }

// echo incr();
// echo incr();
// echo incr();

// $a = 2;
// $a = (float) $a;
// var_dump($a);

// echo __DIR__
// echo __LINE__


// $cars = array (
//   array("Volvo",22),
//   array("BMW",15,13),
//   array("Saab",5,2),
//   array("Land Rover",17,15)
// );

// for ($i=0; $i < count($cars) ; $i++) { 
//     for($j=0; $j< count($cars[$i]) ; $j++ ){
//         echo $cars[$i][$j] ." <br/>" ;
//     }
// }


// // CRUD:
// $myFile = fopen("04_Functions.php", "a") or die("Unable to open file!");
// $myFile = fopen("makeX.php", "x") or die("Unable to open file!");
// $myFile = fopen("04_Functions.php", "w") or die("Unable to open file!");
// $myFile = fopen("04_Functions.php", "r") or die("Unable to open file!");

// // fread, fgets, fgetc ,feof:
// echo fread($myFile, filesize("text.txt"));
// echo fgets($myFile);
// while (!feof($myFile)) {
//     echo fgets($myFile) . "<br/>";
// }

// // write in a file: fwrite:
// $name = "this is come from the Static.php  ";
// fwrite($myFile , $name );
// echo fread($myFile, filesize("text.txt"));

// fclose($myFile);

$num="1";
$num1="2";
print $num + $num1;

