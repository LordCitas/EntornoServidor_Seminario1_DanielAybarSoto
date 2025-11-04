<?php
function etiqueta ($linea): string{
    $resultado = "<";
}

declare(strict_types=1);

try{
    //El número que vamos a usar para probar la función
    $cadena = "a";

    /*
    //Un valor erróneo
    $numero = "hola";
    */

    if(count(preg_split('/[#.]/', $cadena)) == )

    $separacion = preg_split('/[#.]/', $cadena);

    $resultado = $separacion[0];

    foreach ($separacion as $cadena) {

    }

.a#c.v
    //Si el dato no es válido, lanzamos la excepción
    if(is_numeric($numero)){
        echo $numero . ((esCapicua($numero))?"": " NO") . " es capicúa";
    } else {
        throw new ValueError;
    }
} catch (ValueError $e){
    echo "El valor introducido no es válido" . $e->getMessage();
}