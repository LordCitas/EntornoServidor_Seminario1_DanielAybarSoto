<?php
//Una función que calcula el sumatorio de los elementos de un array
function sumatorioArray($array){
    //Inicializamos la variable sumatorio
    $sumatorio = 0;

    //Recorremos el array y sumamos sus elementos
    foreach($array as $elemento){
        $sumatorio += $elemento;
    }

    //Devolvemos el sumatorio
    return $sumatorio;
}

//Definimos el array y mostramos el resultado
$lista = [1,2,3,4,5,6,7,8,9,34,53,24,21,23,21,1,3];
echo sumatorioArray($lista);