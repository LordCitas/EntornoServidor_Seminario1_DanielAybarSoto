<?php
//Una función para calcular el factorial de un número
function calcularFactorial(int $numero): int {
    //Comprobamos que el número no sea negativo
    if ($numero < 0) {
        throw new InvalidArgumentException;
    } elseif ($numero === 0) { //El factorial de 0 es 1
        //Devolvemos el resultado
        return 1;
    } else { //Calculamos el factorial para números positivos
        $factorial = 1;

        //Un bucle para calcular el factorial
        for ($i = 2; $i <= $numero; $i++) {
            $factorial *= $i;
        }
        //Devolvemos el resultado
        return $factorial;
    }
}

//Una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos y mostramos el número del que queremos calcular el factorial
$numero = 10;
echo "El número introducido es: " . $numero . $nl;

//Llamamos a la función de cálculo del factorial dentro de un bloque try-catch
try {
    //Si el valor no es un entero, lanzamos una excepción
    if(!is_int($numero)){
        throw new TypeError;
    } else { //En cualquier otro caso, calculamos el factorial
        $resultado = calcularFactorial($numero);
        echo "El factorial de " . $numero . " es: " . $resultado . $nl;
    }
//Las excepciones que vamos a controlar
} catch (InvalidArgumentException $e){
    echo "El número no puede ser negativo." . $nl;
} catch (TypeError $e){
    echo "La función sólo admite valores enteros." . $nl;
}