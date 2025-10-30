<?php
function etiqueta ($linea): string{
    $resultado = "<";
}

try{
    //El número que vamos a usar para probar la función
    $linea = "a";

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