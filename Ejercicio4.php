<?php

function esPalindromo($palabra){
    $flip = "";
    for($i = strlen($palabra)-1; $i>=0; $i--){
        $flip .= $palabra[$i];
    }
    return $palabra === $flip;
}

$palabra = "anilina";
echo (esPalindromo($palabra))?"\"" . $palabra . "\" es un palíndromo": "\"" . $palabra . "\" NO es un palíndromo";