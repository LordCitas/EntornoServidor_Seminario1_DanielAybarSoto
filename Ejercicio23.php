<?php
//Función para imprimir un array
function imprimirArray($array): void{
    //una variable que imprime un salto de línea adecuado según el entorno
    $nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";
    $longitud = count($array) - 1;

    //Empezamos a imprimir el array
    echo "[";
    //Recorremos el array e imprimimos sus elementos
    for($i = 0; $i < $longitud; $i++){
        echo $array[$i] . ", ";
    }
    //Terminamos la impresión del array
    echo $array[$longitud];
    echo "]" . $nl;
}

function esNumeroArmstrong(int $numero): bool{
    //Si el número es negativo, lanzamos una excepción
    if($numero < 0){
        throw new UnexpectedValueException;
    }

    //Convertimos el número a cadena para poder trabajar con sus dígitos
    $cadena = str_split((string)$numero);

    //Inicializamos las variables necesarias
    $numDigitos = count($cadena);
    $suma = 0;

    //Recorremos los dígitos, elevándolos a la potencia del número de dígitos y sumándolos
    foreach ($cadena as $d) {
        $suma += pow((int)$d, $numDigitos);
    }

    //Devolvemos true si la suma es igual al número original, false en caso contrario
    return ($suma === $numero);
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos el número que vamos a comprobar, y lo mostramos
$numero = 153;
echo "El número introducido es: " . $numero . $nl;

//Llamamos a la función dentro de un bloque try-catch
try {
    //Si el valor no es un entero, lanzamos una excepción
    if (!is_int($numero)) {
        throw new TypeError;
    } else { //En cualquier otro caso, comprobamos si es Armstrong
        echo "El número " . $numero . (esNumeroArmstrong($numero) ? " " : " NO ") . "es un número Armstrong." . $nl;
    }
//Las excepciones que vamos a controlar
} catch (UnexpectedValueException $e) {
    echo "El número no puede ser negativo." . $nl;
} catch (TypeError $e){
    echo "La función sólo admite valores enteros." . $nl;
}
