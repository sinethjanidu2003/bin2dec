<?php

require 'header.php';

function decimalToBinary($decimal){
    $remainder =0;
    $nextValue = 0;
    $binary = "";

    while(true){
        $remainder = $decimal % 2;
        $nextValue = $decimal / 2 ;
        $decimal = $nextValue;
        $binary .=$remainder;
        if($decimal <= 1){
            break;
        }
    }

    return $binary;
}

function binarytoDecimal($binary){
    $new_binary = strrev($binary);
    $BASE = 2;
    $power = 0;
    $decimal = 0;
    foreach (str_split($new_binary) as $po){
        if ($po >=2){
            $decimal = "Error";
            break;
        }
        $valueAfterMult = pow($BASE,$power);
        $value =  $valueAfterMult * $po;
        $decimal += $value;
        $power++;
    }

    return $decimal;
}

function decimalToOctal($decimal){
    
}


?>