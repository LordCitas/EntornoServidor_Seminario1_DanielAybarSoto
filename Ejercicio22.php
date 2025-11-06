<?php
//Una función deparada para calcular y devolver un array con los divisores de un número
function calcularDivisores (int $numero): array{
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

    //Devolvemos el array con los divisores
    return $divisores;
}

//Una función para determinar si un número es perfecto
function esNumeroPerfecto(int $numero): bool{
    if($numero < 1){ //Un número menor que 1 no puede ser perfecto. Si recibimos uno, lanzamos una excepción
        throw new UnexpectedValueException;
    } else {  //En cualquier otro caso, comprobamos si es o no perfecto
        //Calculamos los divisores e inicializamos la suma
        $divisores = calcularDivisores($numero);
        $suma = 0;

        //Recorremos los divisores y los sumamos
        foreach($divisores as $divisor){
            $suma += $divisor;
        }

        //Devolvemos true si el número es perfecto, false en caso contrario (hay que restar el propio número a la suma de sus divisores)
        return $suma - $numero == $numero;
    }
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos el número que vamos a comprobar, y lo mostramos
$numero = 6;
echo "El número introducido es: " . $numero . $nl;

//Llamamos a la función dentro de un bloque try-catch
try {
    //Si el valor no es un entero, lanzamos una excepción
    if (!is_int($numero)) {
        throw new TypeError;
    } else { //En cualquier otro caso, comprobamos si es perfecto
        echo "El número " . $numero . (esNumeroPerfecto($numero) ? " " : " NO ") . "es un número perfecto." . $nl;
    }
//Las excepciones que vamos a controlar
} catch (UnexpectedValueException $e) {
    echo "El número no puede ser menor que 1." . $nl;
} catch (TypeError $e){
    echo "La función sólo admite valores enteros." . $nl;
}

