<?php
//Función para calcular el n-ésimo término de la secuencia de Fibonacci
function nEsimoFibonacci($n): int{
    //Definimos el array con los elementos iniciales
    $elementos = [0, 1];

    //Un bucle para ir ampliando el array hasta el término deseado
    for($i = 2; $i < $n; $i++){
        array_push($elementos, $elementos[$i - 1] + $elementos[$i - 2]);
    }

    //Devolvemos el término deseado
    return ($n == 1) ? $elementos[0] : $elementos[count($elementos) - 1];
}

try{
    //El número del término que vamos a calcular
    $numero = 0;

    /*
    //Unos valores erróneos
    $numero = "hola";
    */

    //Si los datos no son válidos, lanzamos la excepción
    if(is_numeric($numero) && $numero > 0){
        echo "El " . $numero . "º término de la sucesión de Fibonacci es: " . nEsimoFibonacci($numero);
    } else {
        throw new ValueError;
    }
} catch (ValueError $e){
    echo "El número introducido no es válido" . $e->getMessage();
}