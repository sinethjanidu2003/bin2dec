<?php
require 'header.php';
class Functions{

    private function decimalToBinary($decimal){
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

    private function binarytoDecimal($binary){
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

    private function decimalToOctal($decimal){
        $remainder =0;
        $nextValue = 0;
        $octal = "";

        while(true){
            $remainder = $decimal % 8;
            $nextValue = $decimal / 8 ;
            $decimal = $nextValue;
            $octal .=$remainder;
            if($decimal <= 7){
                $octal .= intval($nextValue);
                break;
            }
        }

        return strrev($octal);
    }


    private function octalToDecimal($octal){
        $new_binary = strrev($octal);
        $BASE = 8;
        $power = 0;
        $decimal = 0;
        foreach (str_split($new_binary) as $po){
            if ($po >=7){
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


    private function decimaltoHex($decimal){
        $remainder =0;
        $nextValue = 0;
        $octal = "";

        $equlaValue = [10=>'A',11=>'B',12=>'C',13=>'D',14=>'E',15=>'F'];

        while(true){
            $remainder = $decimal % 16;
            $nextValue = $decimal / 16;
            $decimal = $nextValue;
            if($remainder >= 10){
                $remainder = $equlaValue[$remainder];
            }
            $octal .=$remainder;
            if($decimal <= 15){
                $octal .= intval($nextValue);
                break;
            }
        }

        return strrev($octal);
    }

    private function hexToDecimal($octal){
        $new_binary = strrev($octal);
        $BASE = 16;
        $power = 0;
        $decimal = 0;
        $equlaValue = ['A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15];
        foreach (str_split($new_binary) as $po){
            $valueAfterMult = pow($BASE,$power);
            if(ctype_alpha($po)){
                $value =  $valueAfterMult *$equlaValue[$po];
            }else{
                $value =  $valueAfterMult * $po;
            }
            $decimal += $value;
            $power++;
        }

        return $decimal;
    }

    private function binaryToOctal($value){
        $value = strrev($value);
        $x = 0;
        $output ="";
        $valueAfteMul =0;
        $total = 0;
        foreach(str_split($value) as $var){
            if($x < 3){
                $valueAfteMul = pow(2,$x);
                $valueAfteMul *= $var;
                $total =  $total +$valueAfteMul;
                if($x==2){
                    $output .= $total;
                }
            }else{
                $x = 0;
                $valueAfteMul = pow(2,$x);
                $valueAfteMul *= $var;
                $total = $valueAfteMul;
            }

            $x++;
        }

        return strrev($output);
    }

    private function binaryToHex($value){

        //Fix this Not Completed
       return "Coming Soon";
    }


    public function convertValues($value , $firstSelector, $secondSelector){

        if($firstSelector == "decimal" && $secondSelector =="binary"){
            $value = $this->decimalToBinary($value);
        }else if ($firstSelector == "decimal" && $secondSelector =="octal"){
            $value = $this->decimalToOctal($value);
        }else if($firstSelector == "decimal" && $secondSelector =="hex"){
            $value = $this->decimaltoHex($value);
        }else if($firstSelector == "binary" && $secondSelector =="decimal"){
            $value = $this->binarytoDecimal($value);
        }else if($firstSelector == "binary" && $secondSelector =="octal"){
            $value = $this->binaryToOctal($value);
        }else if($firstSelector == "binary" && $secondSelector =="hex"){
            $value = $this->binaryToHex($value);
        }else if($firstSelector == "octal" && $secondSelector =="decimal"){
            $value = $this->octalToDecimal($value);
        }else if($firstSelector == "octal" && $secondSelector =="binary"){
            $value = "Coming Soon";
        }else if($firstSelector == "octal" && $secondSelector =="hex"){
            $value = "Coming Soon";
        }else if($firstSelector == "hex" && $secondSelector =="decimal"){
            $value = $this->hexToDecimal($value);
        }else if($firstSelector == "hex" && $secondSelector =="binary"){
            $value = "Coming Soon";
        }else if($firstSelector == "hex" && $secondSelector =="octal"){
            $value = "Coming Soon";
        }else{
            $value = "Unknown Function Error -1";
        }

        return [
            'value'=>$value,
            'firstSelector'=>$firstSelector,
            'secondSelector'=>$secondSelector
        ];
    }
}




?>