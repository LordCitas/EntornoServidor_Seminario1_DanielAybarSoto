<?php
function sumarDigitos($numero){
    $palabra = (string)$numero;
    $resultado = 0;
    for($i = ($numero < 0) ? 1 : 0; $i<strlen($palabra); $i++){
        $resultado += (int)$palabra[$i];
    }
    return $resultado;
}

$numero = 9246;
try{
    if(is_numeric($numero)){
        echo sumarDigitos($numero);
    } else {
        throw new ValueError;
    }
} catch (ValueError $e){
    echo "El valor introducido no es válido" . $e->getMessage();
}
