<?php

function sumatorioArray($array){
    $sumatorio = 0;
    foreach($array as $elemento){
        $sumatorio += $elemento;
    }
    return $sumatorio;
}

$lista = [1,2,3,4,5,6,7,8,9,34,53,24,21,23,21,1,3];
echo sumatorioArray($lista);