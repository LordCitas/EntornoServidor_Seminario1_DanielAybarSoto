<?php

function pasarMillasAKilometros($millas){
    return $millas*1.60934;
}

$millas = 100;
echo $millas . " millas equivalen a " . pasarMillasAKilometros(100) . " kilómetros.";
