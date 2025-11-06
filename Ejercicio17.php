<?php
//Función para seleccionar los elementos pares del array
function paresElementosArray($array): array{
    //Inicializamos el array a devolver
    $res = [];

    //Un bucle que recorre los elementos del array
    foreach($array as $elemento){
        if(is_nan($elemento)){
            throw new TypeError;
        } else if(($elemento % 2 == 0)){
            array_push($res, $elemento);
        }
    }
    //Devolvemos el array resultado
    return $res;
}

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
    //Debemos tener cuidado de no intentar acceder a una posición inexistente
    echo (count($array) === 0)? "" : $array[$longitud];
    echo "]" . $nl;
}

//Definimos y mostramos el array que vamos a usar
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "El array introducido es: ";
imprimirArray($array);

//Llamamos a la función de selección dentro de un bloque try-catch
try{
    if(count($array) == 0){
        throw new LengthException;
    } else {
        $resultado = paresElementosArray($array);
        echo "El array con los números pares del original es: ";
        imprimirArray($resultado);
    }
//Excepciones que vamos a controlar
}catch(LengthException $e){
    echo "El array debe tener al menos un elemento";
}catch(TypeError $e){
    echo "Se ha encontrado un valor no entero en el array";
}