<!-- is_iterable -->
<!-- iterable  -->

<?php

$arr = array("RCB", "MI", "CSK");
function iterate(iterable $data)
{
    foreach ($data as $each) {
        echo $each . "<br/>";
    }
}

iterate($arr);
echo "<br/>";

function newFun(): iterable
{
    $arr2 = [];
    for ($i = 0; $i <= 5; $i++) {
        echo $arr2[$i] = $i . "<br/>";
    }
    return $arr2;
}
var_dump(is_iterable(newFun()));
// newFun()();
