<?php
//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Función que imprime el mosaico numérico
function mosaicoNumerico($numero, $nl){
    //Un primer bucle que itera sobre el caracter a imprimir
    for($i = 1; $i <= $numero; $i++){
        $cadena = "";
        //Un segundo bucle que va generando la línea a imprimir
        for($j = 0; $j < $i; $j++){
            $cadena = $cadena . $i;
        }
        //Imprimimos la línea generada
        echo $cadena . $nl;
    }
}

$numero = "8";

try{
    //Si el dato no es válido, lanzamos la excepción
    if(is_numeric($numero)){
        echo mosaicoNumerico($numero, $nl);
    } else {
        throw new ValueError;
    }
}catch (ValueError $e){
    echo "El valor introducido debe ser numérico" . $e->getMessage();
}

