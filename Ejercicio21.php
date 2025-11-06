<?php
//Función para invertir una cadena de texto
function invertirCadena($cadena): string{
    //Si el valor introducido no es una cadena, lanzamos una excepción
    if(!is_string($cadena)){
        throw new InvalidArgumentException;
    } else {
        //En cualquier otro caso, devolvemos la cadena invertida
        return strrev($cadena);
    }
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos y mostramos la cadena que vamos a usar
$cadena = "Hola";
echo "La cadena introducida es: " . $cadena . $nl;

//Llamamos a la función de inversión dentro de un bloque try-catch
try {
    $resultado = invertirCadena($cadena);
    echo "La cadena invertida es: " . $resultado . $nl;
//Las excepciones que vamos a controlar
} catch(InvalidArgumentException $e){
    echo "La función sólo acepta cadenas de texto." . $nl;
}