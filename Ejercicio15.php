<?php
//Función para comparar los elementos de dos arrays
function compararElementosArrays($array1, $array2): array{
    //Inicializamos el array a devolver
    $res = [];

    //Un bucle que recorre los elementos de los arrays
    for($i = 0; $i < count($array1); $i++){
        //Lanzamos una excepción si alguno de los valores no es entero
        if(!is_int($array1[$i]) || !is_int($array2[$i])){
            throw new TypeError;
        } else { //Si son enteros, comparamos y guardamos el resultado
            array_push($res, ($array1[$i] === $array2[$i]) ? "True" : "False");
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

//Definimos y mostramos los arrays a comparar
$array1 = [1, 2, 3, 4, 5];
$array2 = [1, 'a', 0, 4, 5];
imprimirArray($array1);
imprimirArray($array2);

//Llamamos a la función de comparación dentro de un bloque try-catch
try{
    if(count($array1) === 0 || count($array2) === 0){
        throw new UnexpectedValueException;
    } else if(count($array1) != count($array2)){
        throw new LengthException;
    } else {
        $resultado = compararElementosArrays($array1, $array2);
        imprimirArray($resultado);
    }

//Excepciones que vamos a controlar
}catch(UnexpectedValueException $e){
    echo "Los arrays deben tener al menos un elemento" . $e->getMessage();
}catch(LengthException $e){
    echo "Los arrays deben tener la misma longitud" . $e->getMessage();
}catch(TypeError $e){
    echo "Se ha encontrado un valor no entero en uno de los arrays" . $e->getMessage();
}