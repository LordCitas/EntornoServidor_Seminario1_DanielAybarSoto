<?php
//Una función deparada para calcular y devolver un array con los divisores de un número
function calcularDivisores ($numero): array{
    if(!is_int($numero) || $numero < 2){
        throw new InvalidArgumentException;
    } else {
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
    }

    return $divisores;
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Una función para determinar si un número es primo
function esPrimo($numero): bool{
    $divisores = calcularDivisores($numero);
    return count($divisores) == 2;
}

//Definimos y mostramos el valor que vamos a usar
$numero = -7;
echo "El número introducido es: " . $numero . $nl;


//Llamamos a la función de esPrimo dentro de un bloque try-catch
try{
    $resultado = esPrimo($numero);
    echo "El número " . $numero . ($resultado? " " : " NO") . " es primo." . $nl;
//Excepción que vamos a controlar
}catch(InvalidArgumentException $e){
    echo "La función sólo acepta valores enteros mayores que 1." . $nl;
}
