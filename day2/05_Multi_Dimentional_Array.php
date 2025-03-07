<?php

echo "This is a multi Dimentional array <br /> ";

$multArray = array(
    array(1, 2, 3, 4),
    array(5, 6, 7, 8),
    array(9, 10, 11, 12)
);

// echo var_dump($multArray); 
// echo var_export($multArray)

for($i=0 ; $i < count($multArray) ; $i++ ){
    for($j=0 ; $j < count($multArray[$i]) ; $j++ )
    echo $multArray[$i][$j];
    echo "<br />";
}

?>