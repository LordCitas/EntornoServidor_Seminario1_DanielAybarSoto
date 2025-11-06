<?php
//Función para eliminar las vocales de una cadena
function eliminarVocales(string $cadena): string{
    if(strlen($cadena) == 0){
        throw new LengthException;
    } else {
        $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $res = str_replace($vocales, "", $cadena);
    }
    return $res;
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos y mostramos la cadena que vamos a usar
$cadena = "Crea una función que, dada una cadena de texto, elimine todas las vocales de la cadena.";
echo "La cadena introducida es: " . $cadena . $nl;

//Llamamos a la función de eliminación dentro de un bloque try-catch
try {
    $resultado = eliminarVocales($cadena);
    echo "La cadena sin vocales es: " . $resultado . $nl;
} catch(LengthException $e){
    echo "La cadena no puede estar vacía";
}
