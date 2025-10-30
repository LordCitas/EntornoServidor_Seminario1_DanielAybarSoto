<?php
function esCapicua($numero){
    $valorAbsoluto = (string)abs($numero);
    return (strrev($valorAbsoluto) == $valorAbsoluto)? true: false;
}

try{
    //El número que vamos a usar para probar la función
    $numero = -484;

    /*
    //Un valor erróneo
    $numero = "hola";
    */

    //Si el dato no es válido, lanzamos la excepción
    if(is_numeric($numero)){
        echo $numero . ((esCapicua($numero))?"": " NO") . " es capicúa";
    } else {
        throw new ValueError;
    }
} catch (ValueError $e){
    echo "El valor introducido no es válido" . $e->getMessage();
}