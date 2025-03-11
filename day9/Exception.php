<?php

//  function divide($dividend, $divisor){
//     if($divisor == 0){
//         throw new Exception("Divison by zero in not allow");
//     }
//     return $dividend / $divisor;
//  }

//  echo divide(20,10);  


function divide($dividend, $divisor)
{
    try {
        if ($divisor == 0) {
            throw new Exception("Divison by zero in not allow");
        }
        return $dividend / $divisor;
    } catch (Exception $err) {
        echo " unable to divide";
    }
}

echo divide(20,0);
