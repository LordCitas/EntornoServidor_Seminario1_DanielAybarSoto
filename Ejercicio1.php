<?php
//Una función que devuelve el valor máximo de un array
function arrayMax($array){
    //Si el array está vacío, lanzamos una excepción
    if(count($array) == 0){
        throw new InvalidArgumentException();
    } else { //En cualquier otro caso, buscamos el valor máximo
        //Inicializamos la variable del máximo con el primer valor del array
        $max = $array[0];

        //Un bucle que recorre y compara los valores del array
        for ($i = 1; $i < count($array); $i++) {
            if(!is_numeric($array[$i])){
                throw new UnexpectedValueException;
            } else if ($array[$i] > $max) {
                $max = $array[$i];
            }
        }

        //Devolvemos el valor máximo encontrado
        return $max;
    }
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
$array = [10,2,3,4,5,6,7,8,5,9];
echo "El array introducido es: ";
imprimirArray($array);

//Llamamos a la función de selección dentro de un bloque try-catch
try{
    //Si el valor no es un array, lanzamos una excepción
    if(!is_array($array)){
        throw new InvalidArgumentException;
    } else { //En cualquier otro caso, calculamos el máximo
        echo arrayMax($array);
    }
//Excepciones que vamos a controlar
} catch (LengthException $e){
    echo "El array debe tener al menos un elemento";
} catch (InvalidArgumentException|UnexpectedValueException $e){
    echo "La función sólo admite arrays de números";
}

