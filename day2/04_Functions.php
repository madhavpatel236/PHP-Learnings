<?php

echo "Hello World <br /> ";

function Avaerage($marksArray){
    $total = 0;
    $i = 1 ;
    foreach($marksArray as $eachSubMarks){
        $total+= $eachSubMarks;
        $avg = $total/$i;
        return $avg;
    }
}

$marksArray = [95,96,94];
$Average = Avaerage($marksArray);
echo " Average of the marks is $Average <br /> ";

// add the data in the another file with the help of the file_put_contents
file_put_contents('0_madhav.php', "This message is come from the 04_Functions.php");
echo "File created successfully at 0_madhav.php. <br />";


// Anonmotion function
$greet = function($name) {
    printf("Hello %s\r\n",  $name );
    echo "<br />";
};

$greet('World');
$greet(name: 'PHP');


// Arrow function
$a = 1;
$Arrow = fn( $a ) => $a + 1  ;
echo $Arrow($a);


?>