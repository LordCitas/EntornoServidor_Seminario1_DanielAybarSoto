<?php

function arrayMax($array){
    $max = $array[0];
    for($i = 1; $i < count($array); $i++){
        if ($array[$i] > $max){
            $max = $array[$i];
        }
    }
    return $max;
}

$array = [1,2,3,4,5,6,7,8,5,9];
echo arrayMax($array);

