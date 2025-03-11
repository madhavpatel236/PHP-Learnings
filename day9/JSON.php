<!-- json_decode(); -->
<!-- json_encode(); -->
<!-- access the element from the php object. -->
<!-- access the element from the php arrays. -->
<!-- loop in the php object. -->
<!-- loop in the php array. -->



<?php

$arr = array("RCB" => 18, "MI" => 45, "CSK" => 7);
$obj = '{"RCB": 18, "MI": 45, "CSK": 7}';
echo json_encode($arr) . "<br/>";

var_dump(json_decode('{"RCB":18,"MI":45,"CSK":7}')); // this is decode in the object form not in the array.
echo "<br/>";
var_dump(json_decode('{"RCB":18,"MI":45,"CSK":7}', true)); // with the second parameter of the json_decode -> true, give the array in the assosiative array.


// How to access a php object value
$obj2 = json_decode($obj);
echo "<br/>" . $obj2->RCB;

// How to access a value from the Associative array
$array = json_decode($obj, true);
echo "<br/>" . $array["MI"];


// looping in the php object
foreach ($obj2 as $key => $value) {
    echo "<br/>" . "key: " . $key . ", value: " . $value;
}

// looping to the associative array
foreach ($array as $key => $value) {
    echo "<br/>" . "key: " . $key . ", value: " . $value;
}
