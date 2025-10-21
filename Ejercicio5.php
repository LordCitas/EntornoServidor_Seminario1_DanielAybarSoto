<?php
function contarLetraEnTexto($letra, $texto){
    $contador = 0;
    for($i = 0; $i<strlen($texto); $i++){
        if($texto[$i] == $letra){
            $contador++;
        }
    }
    return $contador;
}

$texto = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin fringilla malesuada. Vestibulum orci massa, sollicitudin vitae est in, luctus sodales enim. Aliquam nec elit quis nibh viverra feugiat. Sed.";
$letra = 'a';
echo "La letra '" . $letra . "' aparece un total de " . contarLetraEnTexto($letra, $texto) . " veces en el texto.";