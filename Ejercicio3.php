<?php
//Una función que convierte millas a kilómetros
function pasarMillasAKilometros(float $millas): float{
    //Devolvemos el valor convertido
    return $millas*1.60934;
}

//Definimos las millas a convertir
$millas = 100;

//Llamamos a la función dentro de un bloque try-catch
try{
    //Validamos que el valor es numérico y positivo
    if (!is_numeric($millas) || $millas < 0){
        throw new UnexpectedValueException;
    }
    //Mostramos el resultado
    echo $millas . " millas equivalen a " . pasarMillasAKilometros(100) . " kilómetros.";
} catch (UnexpectedValueException $e){
    echo "El valor de millas debe ser un número positivo.";
}
