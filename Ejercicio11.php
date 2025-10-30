<?php
//Una función deparada para calcular y devolver un array con los divisores de un número
function calcularDivisores ($numero): array{
    //Definimos un array para guardar los divisores
    $divisores = [];

    //Solo tendremos que iterar hasta la mitad del número
    $max = $numero/2;

    //El bucle que va haciendo comprobaciones y guardando los divisores
    for($i = 1; $i<=$max; $i++){
        if($numero % $i == 0){
            array_push($divisores, $i);
        }
    }
    //Por último, añadimos el propio número como último divisor
    array_push($divisores, $numero);

    return $divisores;
}

//Una función para calcular y devolver el máximo común divisor de dos números
function maximoComunDivisor ($primero, $segundo): int{
    //Definimos un array para los grupos de divisores de cada número
    $divisores1 = calcularDivisores($primero);
    $divisores2 = calcularDivisores($segundo);

    //Definimos e inicializamos el máximo (como mínimo, siempre será 1)
    $max = 1;

    //El bucle de comprobaciones lo haremos en orden descendente
    for($i = count($divisores1) - 1; $i>=0; $i--){
        if(in_array($divisores1[$i], $divisores2)){
            //En el momento en que encontremos un divisor común, ya sabemos que es el máximo
            $max = $divisores1[$i];
            break;
        }
    }
    return $max;
}

function sonPrimosRelativos($primero, $segundo){
    return (maximoComunDivisor($primero, $segundo) == 1)? true : false;
}

try{
    //Los dos valores que vamos a usar para comprobar las funciones
    $primero = 48;
    $segundo = 24;

    /*
    //Unos valores erróneos
    $primero = "hola";
    $segundo = 24;
    */

    //Si los datos no son válidos, lanzamos la excepción
    if(is_numeric($primero) && is_numeric($segundo)){
        echo maximoComunDivisor($primero, $segundo) . "    -    \n";
        echo $primero . ((sonPrimosRelativos($primero, $segundo))?"": " NO") . " es primo relativo de " . $segundo;
    } else {
        throw new ValueError;
    }
} catch (ValueError $e){
    echo "Los valores introducidos no son válidos" . $e->getMessage();
}