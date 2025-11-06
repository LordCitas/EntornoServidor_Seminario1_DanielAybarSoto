<?php
//Una función con match para clasificar una nota numérica
function clasificarNota(int $nota): string{
    return match(true){
        $nota >= 0 && $nota < 5 => "Suspenso",
        $nota >= 5 && $nota < 7 => "Aprobado",
        $nota >= 7 && $nota < 9 => "Notable",
        $nota >= 9 && $nota <= 10 => "Sobresaliente",
        default => throw new UnexpectedValueException,
    };
}

//Una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos la nota a clasificar y la mostramos
$nota = 7;
echo "La nota introducida es: " . $nota . $nl;

//Llamamos a la función dentro de un bloque try-catch
try {
    //Si el valor no es un entero, lanzamos una excepción
    if (!is_int($nota)) {
        throw new TypeError;
    }

    //En cualquier otro caso, clasificamos la nota
    $clasificacion = clasificarNota($nota);
    echo "La clasificación de la nota " . $nota . " es: " . $clasificacion . "." . $nl;
//Las excepciones que vamos a controlar
} catch (UnexpectedValueException $e) {
    echo "La nota debe estar entre 0 y 10." . $nl;
} catch (TypeError $e){
    echo "La función sólo admite valores enteros." . $nl;
}
