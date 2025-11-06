<?php
//Función para comparar los elementos de dos arrays
function productoElementosArray($array){
    //Inicializamos el entero a devolver
    $res = 1;

    imprimirArray($array);
    //Un bucle que recorre los elementos de los arrays
    foreach($array as $elemento){
        if(!is_int($elemento)){
            throw new TypeError;
        } else {
            $res *= $elemento;
        }
    }
    //Devolvemos el array resultado
    return $res;
}

//Función para imprimir un array
function imprimirArray($array){
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

//Definimos y mostramos el array que vamos a usar
$array = [1, 2, 3, 4, 5];
imprimirArray($array);

//Llamamos a la función de comparación dentro de un bloque try-catch
try{
    if(count($array) == 0){
        throw new LengthException;
    } else {
        $resultado = productoElementosArray($array);
        imprimirArray($resultado);
    }
//Excepciones que vamos a controlar
}catch(LengthException $e){
    echo "El array debe tener al menos un elemento" . $e->getMessage();
}catch(TypeError $e){
    echo "Se ha encontrado un valor no entero en el array" . $e->getMessage();
}