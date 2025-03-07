<?php

$arr = [1, 2, 3, 4];
$Total = 0;

var_export($arr);
echo '<br />';

function Sum($Numbers, $total)
{
    for ($i = 0; $i < count($Numbers); $i++) {
        $total += $Numbers[$i];
    }
    return $total;
}

$totalOfArray = Sum( $arr, $Total );

echo "Sum is:  $totalOfArray";